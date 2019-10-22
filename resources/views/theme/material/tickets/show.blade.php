@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><h4>

                            <a href="/tickets/open"
                               class="btn btn-sm">
                                <i class="material-icons">
                                    reply
                                </i>
                            </a>

                            @lang($ticket->subject)
                            <span
                                    class="badge badge-secondary status-{{$ticket->status}}">{{$ticket->status()}}</span>
                            <br>
                            <b>{{$ticket->user()->first()->name}}</b>
                            @lang('in')
                            <b>{{$ticket->department()->first()->title}}</b>
                        </h4></div>
                </div>

                <hr>

                @forelse($ticket->replies()->get() as $ticketsReplies)

                    <div class="card inner-ticket" id="body-tid">
                        <div class="card-body">

                            <div class="tickid">
                                @lang('data di inserimento')
                                : {{$ticketsReplies->created_at->format(config('app.format'))}}
                            </div>


                            @if($ticket->user()->find(auth()->id()) || auth()->user()->admin())

                                <div data-toggle="modal" data-target="#change-dp"
                                     data-ticket="{{$ticketsReplies->ticket()->first()->id}}"
                                     data-id="{{$ticketsReplies->id}}">
                                    <div class="change-dep cursor-pointer"
                                         data-toggle="tooltip" data-placement="bottom"
                                         title="@lang('Sposta in un nuovo ticket')">
                                        <i class="material-icons">
                                            exit_to_app
                                        </i>
                                    </div>
                                </div>
                            @endif

                            <span data-toggle="tooltip" data-placement="bottom"
                                  title="{{$ticketsReplies->user()->first()->name}}"
                                  class="dip-user role-{{$ticketsReplies->user()->first()->role}}">
                                {{substr($ticketsReplies->user()->first()->name, 0, 2)}}
                            </span>

                            @foreach(unserialize($ticketsReplies->row) as $key => $datasine)
                                @switch($datasine['type'])

                                    @case('image')
                                    <img src="{{$datasine['data']['file']['url']}}" width="100%">
                                    <br>
                                    <br>
                                    @break

                                    @case('header')
                                    <h2>{!! $datasine['data']['text'] !!}</h2>
                                    @break

                                    @case('paragraph')
                                    <p>{!! $datasine['data']['text'] !!}</p>
                                    @break

                                    @case('linkTool')

                                    <div class="card">
                                        <h6 class="card-headers">
                                            <img src="{!! $datasine['data']['meta']['image']['url'] !!}" width="125px">
                                            {!! $datasine['data']['meta']['title'] !!}
                                        </h6>
                                        <div class="card-body">
                                            <p class="card-text">{!! $datasine['data']['meta']['description'] !!}</p>
                                            <a href="{!! $datasine['data']['link'] !!}" target="_blank"
                                               class="btn btn-primary">@lang('apri link')</a>
                                        </div>
                                    </div>
                                    <br>

                                    @break

                                    @case('attaches')
                                    <div class="alert alert-dark" role="alert">
                                        <h5> {{$datasine['data']['title']}} |
                                            <span onclick='window.open("{{$datasine['data']['file']['url']}}")'
                                                  class="btn btn-info "><i class="material-icons">
                                                        cloud_download </i></span>
                                        </h5>
                                    </div>
                                    <br>

                                    @break

                                    @case('tiny')
                                    {!! $datasine['data'] !!}
                                    @break

                                    @default

                                    {{-- dd($datasine) --}}

                                @endswitch

                            @endforeach
                        </div>
                    </div>
                @empty
                    <div class="jumbotron jumbotron-fluid">
                        <div class="container">
                            <h1 class="display-4"> @lang('niente in vista')</h1>
                            <p class="lead">@lang('questo ticket non contiene nessun contenuto da mostrare')</p>
                        </div>
                    </div>
                @endforelse

                <hr>

                <div class="card">
                    <div class="card-footer">
                        <div class="row text-center">

                            @if($ticket->status === 2)
                                <div class="col">
                                    <a href="/status/1/ticket/{{$ticket->id}}"
                                       class="btn btn-success"><i class="material-icons">
                                            redo </i> @lang('ri-apri')</a>
                                </div>

                            @else

                                <div class="col">
                                    <button onclick="return alert('under costruction')" type="button"
                                            class="btn btn-warning"><i class="material-icons">
                                            announcement </i> @lang('segnala')</button>
                                </div>
                                <div class="col">
                                    <a href="/status/2/ticket/{{$ticket->id}}"
                                       class="btn btn-danger"><i
                                                class="material-icons">
                                            remove_circle </i> @lang('chiudi')</a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-info tiny-open"><i
                                                class="material-icons">
                                            create </i> @lang('rispondi')</button>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="reply-ticket">
        <div class="card ticket">
            <div class="card-body">
                <div id="tiny-editor"></div>
            </div>

            <div class="card-header" style=" position: absolute; right: 0; ">

                <button type="button" class="btn btn-danger bmd-btn-fab tiny-close">
                    <i class="material-icons">close</i>
                </button>

                <button id="ticket" data-tid="{{$ticket->id}}" type="button"
                        class="btn btn-success bmd-btn-fab tiny-reply">
                    <i class="material-icons">done</i>
                </button>

            </div>

        </div>
    </div>

    <div class="modal fade" id="change-dp" tabindex="-1" role="dialog" aria-labelledby="change-dp" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <form action="/tickets/change/dp" method="post">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="change-dp">@lang('Sposta in un nuovo ticket')</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="reply" name="reply" value="">
                        <input type="hidden" id="ticket" name="ticket" value="">
                        <input name="subject" value="" class="form-control"
                               placeholder="@lang('titolo del nuovo ticket')" required>
                        <select class="form-control" name="department" required>
                            @foreach(\App\Department::all() as $department)
                                <option value="{{$department->id}}">@lang($department->title)</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script rel="script" type="application/javascript">
        $('#body-tid a').each(function () {
            $(this).addClass('_blank');
        });

        $('#body-tid img').each(function () {
            $(this).css('width', '100%');
            $(this).css('object-fit', 'contain');
        });

        $('#change-dp').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var ticket = button.data('ticket') // Extract info from data-* attributes
            var reply = button.data('id') // Extract info from data-* attributes
            var modal = $(this);
            modal.find('#ticket').val(ticket);
            modal.find('#reply').val(reply);
        })
    </script>
@endsection