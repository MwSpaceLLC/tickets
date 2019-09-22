@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row ">

                <div class="col-md-12">

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
                                <th scope="col">@lang('stato')</th>
                                <th scope="col">@lang('utenti')</th>
                                <th scope="col">@lang('tickets')</th>
                                <th scope="col">@lang('creazione')</th>
                                <th scope="col">@lang('stato')</th>
                                <th scope="col">@lang('utenti')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Department::paginate(8) as $department)
                                <tr>
                                    <th scope="row">{{$department->id}}</th>
                                    <td><span class="dip-color" style="background: {{$department->rgb}}"></span>{{$department->title}}</td>
                                    <td><span class="badge badge-secondary status-{{$department->status}}">{{$department->status()}}</span></td>
                                    <td >{{$department->user()->groupBy('user_id')->count()}}</td>
                                    <td>{{$department->tickets()->count()}}</td>
                                    <td>{{$department->created_at->diffForHumans()}}</td>
                                    <td>
                                        <label class="pure-material-switch"
                                               onchange="location.href='/department/{{$department->id}}/status/{{$department->status}}'">
                                            <input type="checkbox" {{$department->status?'checked':''}}>
                                            <span></span>
                                        </label>
                                    </td>
                                    <td><a href="/department/{{$department->id}}/manage"
                                           title="@lang('gestione utenti')"
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
