@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if(Auth::user()->active)
                @include('component.sidebar')
            @endif

            <div class="col-md-10">

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
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\User::paginate(8) as $user)
                                <tr>
                                    <th scope="row">{{$user->id}}</th>
                                    <td data-toggle="tooltip" data-placement="top"  class="{{$user->role === 1?'admin':''}}" title="{{$user->role()}}">{{$user->name}}</td>
                                    <td><span
                                            class="badge badge-secondary status-{{$user->active}}">{{$user->active()}}</span>
                                    </td>
                                    <td>{{$user->tickets()->count()}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td><a href="/user/{{$user->id}}/status/{{$user->active}}"
                                           class="btn btn-sm btn-raised {{$user->active?'btn-warning':'btn-success'}}">

                                            @if($user->active)
                                                <i class="material-icons" title="@lang('disattiva')"> cloud_off </i>
                                            @else
                                                <i class="material-icons" title="@lang('attiva')"> cloud_done </i>
                                            @endif
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
