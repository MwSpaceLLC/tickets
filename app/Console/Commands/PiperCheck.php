<?php

namespace App\Console\Commands;

use App\Department;
use App\Pipe;
use App\TicketReply;
use App\Tickets;
use App\User;
use Illuminate\Support\Facades\Log;
use Webklex\IMAP\Client;
use Illuminate\Console\Command;

class PiperCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'piper:check';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check smtp ticket from some Host';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws \Webklex\IMAP\Exceptions\ConnectionFailedException
     * @throws \Webklex\IMAP\Exceptions\GetMessagesFailedException
     * @throws \Webklex\IMAP\Exceptions\InvalidMessageDateException
     * @throws \Webklex\IMAP\Exceptions\MailboxFetchingException
     * @throws \Webklex\IMAP\Exceptions\MaskNotFoundException
     */
    public function __invoke()
    {
        $this->handle();
    }

    /**
     * @throws \Webklex\IMAP\Exceptions\ConnectionFailedException
     * @throws \Webklex\IMAP\Exceptions\GetMessagesFailedException
     * @throws \Webklex\IMAP\Exceptions\InvalidMessageDateException
     * @throws \Webklex\IMAP\Exceptions\MailboxFetchingException
     * @throws \Webklex\IMAP\Exceptions\MaskNotFoundException
     */
    public function handle()
    {
        $this->info('START TO CONNECT...');

        $piper = Pipe::all();

        $bar = $this->output->createProgressBar(count($piper));

        $bar->start();

        foreach ($piper as $pipe) {
            if ($pipe->status > 0) {
                $this->task($pipe);
            }
            $bar->advance();
        }

        $bar->finish();

        $this->info('');
        $this->info('SUCCESS! ALL HOST HAS BEEN CHECKED');

        // TODO: alert for department

    }

    /**
     * @param $pipe
     * @throws \Webklex\IMAP\Exceptions\ConnectionFailedException
     * @throws \Webklex\IMAP\Exceptions\GetMessagesFailedException
     * @throws \Webklex\IMAP\Exceptions\InvalidMessageDateException
     * @throws \Webklex\IMAP\Exceptions\MailboxFetchingException
     * @throws \Webklex\IMAP\Exceptions\MaskNotFoundException
     *
     * https://github.com/Webklex/laravel-imap
     */
    private function task($pipe)
    {
        $oClient = new Client([
            'host' => $pipe->host,
            'port' => $pipe->port,
            'encryption' => $pipe->encryption,
            'validate_cert' => false,
            'username' => $pipe->username,
            'password' => $pipe->password,
            'protocol' => 'pop3'
        ]);

        /* Alternative by using the Facade
        $oClient = Webklex\IMAP\Facades\Client::account('default');
        */

        //Connect to the IMAP Server
        $oClient->connect();

        //Get all Mailboxes
        /** @var \Webklex\IMAP\Support\FolderCollection $aFolder */
        $aFolder = $oClient->getFolders();

        //Loop through every Mailbox
        /** @var \Webklex\IMAP\Folder $oFolder */
        foreach ($aFolder as $oFolder) {

            //Get all Messages of the current Mailbox $oFolder
            /** @var \Webklex\IMAP\Support\MessageCollection $aMessage */
            $aMessage = $oFolder->messages()->all()->get();

            /** @var \Webklex\IMAP\Message $oMessage */
            foreach ($aMessage as $oMessage) {

                // $oMessage->getAttachments()

                $sender = $oMessage->getSender()[0];

                if ($user = User::where('email', $sender->mail)->first()) {
                    $ticket = new Tickets();
                    $ticket->user_id = $user->id;
                    $ticket->department_id = Department::where('mail_id', $pipe->id)->first()->id;
                    $ticket->subject = $oMessage->getSubject();
                    $ticket->save();

                    $ticketReply = new TicketReply();
                    $ticketReply->user_id = $user->id;
                    $ticketReply->ticket_id = $ticket->id;
                    $ticketReply->row = $oMessage->getHTMLBody(true);
                    $ticketReply->save();
                }

                // Delete message for security
                if (!$oMessage->delete()) {

                    Log::alert('Failed DELETE the current Message');
                    return $this->error('Failed DELETE the current Message');
                }

                // TODO: auto reply for success open ticket

            }
        }
    }
}
