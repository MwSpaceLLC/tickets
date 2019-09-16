@component('mail::message')
# {{$ticket->user()->first()->name}} @lang('ha postato in un nuovo Ticket').

@lang('Per interagire con il Ticket:') {{url("/ticket/$ticket->id")}}<br>
{{ config('app.name') }}
@endcomponent
