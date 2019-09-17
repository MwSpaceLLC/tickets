<tr>
    <th scope="row">#{{$ticket->id}}</th>
    <td>
                                        <span class="dip-color"
                                              data-toggle="tooltip" data-placement="left"
                                              title="{{$ticket->department()->first()->title}}"
                                              style="background: {{$ticket->department()->first()->rgb}}"></span>

        {{$ticket->subject}}<br>
        <strong>{{$ticket->department()->first()->title}}</strong><br>

        <div class="si-views">
            @foreach($ticket->views()->get() as $views)
                <span data-toggle="tooltip" data-placement="bottom"
                      title="@lang('letto da') {{$views->user()->first()->name}}"
                      class="dip-user-list role-{{$views->user()->first()->role}}">
                                                    {{substr($views->user()->first()->name, 0, 1)}}
                                            </span>
            @endforeach
        </div>

    </td>

    <td><span
            class="badge badge-secondary status-{{$ticket->status}}">{{$ticket->status()}}</span>
    </td>

    @if($ticket->replies()->first())
        <th class="row">
            <div class="col-md-2">
                                                <span data-toggle="tooltip" data-placement="top"
                                                      title="{{$ticket->replies()->orderBy('created_at', 'DESC')->first()->user()->first()->name}}"
                                                      class="dip-user-list role-{{$ticket->replies()->orderBy('created_at', 'DESC')->first()->user()->first()->role}}">
                                                    {{substr($ticket->replies()->orderBy('created_at', 'DESC')->first()->user()->first()->name, 0, 1)}}
                                                </span>
            </div>
            <div class="col">
                {{$ticket->replies()->orderBy('created_at', 'DESC')->first()->created_at->diffForHumans()}}
            </div>
        </th>

    @else

        <th scope="row">{{$ticket->created_at->diffForHumans()}}</th>
    @endif

    <td><a href="/ticket/{{$ticket->id}}"
           class="btn btn-sm {{$ticket->replies()->first()?'btn-primary':'btn-warning'}}">
            <i class="material-icons">
                open_in_new
            </i>
        </a>
    </td>
</tr>
