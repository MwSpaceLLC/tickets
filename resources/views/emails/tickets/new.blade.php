<div style="margin:0;padding:0;background:#f4f4f4">
    <div class="adM">
    </div>
    <table cellpadding="10" cellspacing="0" border="0" width="100%" style="width:0 auto">
        <tbody>
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0" border="0" width="680"
                       style="border:0;width:0 auto;max-width:680px">
                    <tbody>
                    <tr>
                        <td style="padding:15px 0 20px 0;background-color:#ffffff;border:2px solid #e8e8e8;border-bottom:2px solid #834ccc">
                            <table width="680" border="0" cellpadding="0" cellspacing="0"
                                   style="background:#ffffff;font-family:'Helvetica Neue',Helvetica,Arial,sans-serif">
                                <tbody>
                                <tr>
                                    <td width="15">
                                    </td>
                                    <td width="650">
                                        <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                            <tbody>
                                            <tr>
                                                <td>
                                                    <table>
                                                        <tbody>
                                                        <tr>
                                                            <th align="right">
                                                                Ticket:
                                                            </th>
                                                            <td align="left">
                                                                <a href="{{url("ticket/$ticket->id")}}"
                                                                   target="_blank">{{$ticket->subject}}</a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="right">
                                                                Dipartimento:
                                                            </th>
                                                            <td align="left">
                                                                <span>{{$ticket->department()->first()->title}}</span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th align="right">
                                                                Ultima risposta:
                                                            </th>
                                                            <td align="left">
                                                                <span>{{$ticket->replies()->latest()->first()->created_at}}</span>
                                                            </td>
                                                        </tr>

                                                        </tbody>
                                                    </table>

                                                    <blockquote style="font-style: oblique;opacity: 0.5;">
                                                        "<b>{{$ticket->replies()->latest()->first()->user()->first()->name}}</b>"
                                                        ha lasciato una risposta
                                                    </blockquote>

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;border-top:2px solid #e8e8e8;padding-top:5px;margin-top:5px;font-size:12px;color:#666666">
                                                        {!!  $ticket->replies()->latest()->first()->row !!}
                                                    </div>

                                                    <hr>

                                                    <div style="opacity: 0.6;display: flex;justify-content: space-around;">
                                                        <span><a href="{{url("ticket/$ticket->id")}}" target="_blank">Rispondi</a></span>
                                                        |
                                                        <span><a href="{{url("status/2/ticket/$ticket->id")}}"
                                                                 target="_blank">Chiudi</a></span> |
                                                        <span><a href="{{url("tickets/working")}}" target="_blank">In Attesa</a></span>
                                                    </div>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </td>
                                    <td width="15">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding-top:10px">
                            <img src="{{url('/square-logo.png')}}" height="25" width="25"
                                 style="border:0;line-height:100%;border:0" alt="cP" data-image-whitelisted=""
                                 class="CToWUd">
                            <p style="font-family:'Helvetica Neue',Helvetica,Arial,sans-serif;font-size:12px;color:#666666;padding:0;margin:0">
                                Copyright©&nbsp;{{date('Y')}} {{config('app.name')}}</p>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>