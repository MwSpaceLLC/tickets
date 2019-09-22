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
                                <th scope="col">@lang('accesso')</th>
                                <th scope="col">@lang('permessi')</th>
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
                                    @if(!$user->admin())
                                        <td>
                                            <label class="pure-material-switch"
                                                   onchange="location.href='/user/{{$user->id}}/status/{{$user->active}}'">
                                                <input type="checkbox" {{$user->active?'checked':''}}>
                                                <span></span>
                                            </label>
                                        </td>
                                        @else
                                        <td></td>
                                        @endif
                                    <td><a href="/user/{{$user->id}}/manage"
                                           title="@lang('gestione permessi')"
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
