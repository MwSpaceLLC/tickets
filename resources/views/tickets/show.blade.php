@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if(Auth::user()->active)
                @include('component.sidebar')
            @endif

                <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><h4>

                            <a href="/tickets/open"
                               class="btn btn-sm {{$ticket->replies()->first()?'btn-primary':'btn-warning'}}">
                                <i class="material-icons">
                                    reply
                                </i>
                            </a>

                            @lang($ticket->subject) <span
                                class="badge badge-secondary status-{{$ticket->status}}">{{$ticket->status()}}</span>
                        </h4></div>
                </div>

                <hr>

                @forelse($ticket->replies()->get() as $ticketsReplies)

                    <div class="card inner-ticket">
                        <div class="card-body">

                            <span class="dip-user role-{{$ticketsReplies->user()->first()->role}}">
                                {{substr($ticketsReplies->user()->first()->name, 0, 1)}}
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

                                        <div class="row">
                                            <div class="col-md-10">
                                                <h5> {{$datasine['data']['title']}}</h5>
                                            </div>
                                            <div class="col-md-2">
                                                <a href="#" class="btn btn-info "><i class="material-icons">
                                                        cloud_download </i></a>
                                            </div>

                                        </div>
                                    </div>
                                    <br>

                                    @break

                                    @default

                                    {!! dd($datasine) !!}

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
                                    <button type="button" class="btn btn-success"><i class="material-icons">
                                            redo </i> @lang('ri-apri')</button>
                                </div>

                            @else

                                <div class="col">
                                    <button type="button" class="btn btn-warning"><i class="material-icons">
                                            announcement </i> @lang('segnala')</button>
                                </div>
                                <div class="col">
                                    <a href="/status/2/ticket/{{$ticket->id}}"
                                       onclick="return confirm('@lang('sei sicuro ?')')" class="btn btn-danger"><i
                                            class="material-icons">
                                            remove_circle </i> @lang('chiudi')</a>
                                </div>
                                <div class="col">
                                    <button type="button" class="btn btn-info reply-ticket-btn"><i
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
            <div class="card-header">
                <div class="row text-center">
                    <div class="col">
                        <button type="button" class="btn btn-warning reply-ticket-btn">
                            <i class="material-icons"> close </i> @lang('annulla')</button>
                    </div>

                    <div class="col">
                        <button type="button" class="btn btn-info send-reply-ticket"><i class="material-icons">
                                create </i> @lang('rispondi')</button>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <div id="codex-editor" data-ticket="{{$ticket->id}}"
                     data-placeholder="@lang('Scrivi il contenuto del ticket con Testo, Immagini e allegati')"></div>
            </div>
        </div>
    </div>

@endsection
