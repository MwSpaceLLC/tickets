@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-body">

                        <table class="table">
                            <thead class="head-black">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">@lang('nome')</th>
                                <th scope="col">@lang('stato')</th>
                                <th scope="col">@lang('tickets')</th>
                                <th scope="col">@lang('creazione')</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\User::paginate(8) as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td data-toggle="tooltip" data-placement="top"
                                        class="{{$user->role === 1?'admin':''}}"
                                        title="{{$user->role()}}">{{$user->name}}</td>
                                    <td><span
                                            class="badge badge-secondary status-{{$user->active}}">{{$user->active()}}</span>
                                    </td>
                                    <td>{{$user->tickets()->count()}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td><a href="/user/{{$user->id}}/status/{{$user->active}}"
                                           title="{{$user->active?'disattiva':'attiva'}}"
                                           class="btn btn-sm {{$user->active?'btn-success':'btn-warning'}}">

                                            @if($user->active)
                                                <i class="material-icons">
                                                    lock_open
                                                </i>
                                            @else
                                                <i class="material-icons">
                                                    lock
                                                </i>
                                            @endif
                                        </a>
                                    </td>
                                    <td><a href="/user/{{$user->id}}/manage"
                                           title="gestione permessi"
                                           class="btn btn-sm btn-secondary">
                                            <i class="material-icons">
                                                recent_actors
                                            </i>
                                        </a>
                                    </td>
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
