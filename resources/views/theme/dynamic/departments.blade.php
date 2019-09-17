@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if(auth()->user()->active)
                @include("$component.sidebar")
            @endif

                <div class="col-md-10">

                <form action="/new/department" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-4">
                                    <input name="title" value="" class="form-control bg-white"
                                           placeholder="@lang('🎈 nome del nuovo dipartimento')" required>
                                </div>

                                <div class="col">
                                    <input name="description" value="" class="form-control"
                                           placeholder="@lang('descrivi il nuovo dipartimento')" required>
                                </div>

                                <div class="col">
                                    <input name="rgb" value="7900f5" class="form-control jscolor"
                                           placeholder="@lang('descrivi il nuovo dipartimento')" required>
                                </div>

                                <div class="col">
                                    <button class="btn btn-raised btn-outline-secondary">@lang('salva')</button>
                                </div>

                            </div>
                        </div>
                    </div>
                </form>

                <div class="card">
                    <div class="card-body">

                        <table class="table">
                            <thead class="head-black">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('nome')</th>
                                <th scope="col">@lang('utenti')</th>
                                <th scope="col">@lang('tickets')</th>
                                <th scope="col">@lang('creazione')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Department::paginate(8) as $ticket)
                                <tr>
                                    <th scope="row">{{$ticket->id}}</th>
                                    <td><span class="dip-color" style="background: {{$ticket->rgb}}"></span>{{$ticket->title}}</td>
                                    <td><span class="badge badge-secondary status-{{$ticket->status}}">{{$ticket->status()}}</span></td>
                                    <td>{{$ticket->tickets()->count()}}</td>
                                    <td>{{$ticket->created_at->diffForHumans()}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
