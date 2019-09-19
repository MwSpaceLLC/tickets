@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    <form action="/user/{{$user->id}}/update" method="post">
                        @csrf
                        <div class="card-header">
                            <h3 class="text-role-{{$user->role}}">
                                <a href="/users"
                                   class="btn btn-sm">
                                    <i class="material-icons">
                                        reply
                                    </i>
                                </a>
                                <div class="avatar av-role role-{{$user->role}}">
                                    <span>{{substr($user->name, 0, 2)}}</span>
                                </div>
                                {{$user->name}}</h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h3>@lang('Accesso reparti')</h3>
                            @foreach(\App\Department::paginate(8) as $department)
                                <div class="row">
                                    <div class="col-md-6">
                                        <h6>{{$department->title}}</h6>
                                        <p>{{$department->description}}</p>
                                    </div>
                                    <div class="col flex-center">
                                        <label class="form-check-label pure-material-checkbox">

                                            @if($role = $department->user()->where('user_id',$user->id)->first())
                                                <input type="checkbox"
                                                       {{$role->write? 'checked':''}} name="department[{{$department->id}}][write]"
                                                       id="remember">
                                            @else
                                                <input type="checkbox" name="department[{{$department->id}}][write]"
                                                       id="remember">
                                            @endif
                                            <span>@lang('scrivi')</span>
                                        </label>
                                        <label class="form-check-label pure-material-checkbox">
                                            @if($role = $department->user()->where('user_id',$user->id)->first())
                                                <input type="checkbox"
                                                       {{$role->read? 'checked':''}} name="department[{{$department->id}}][read]"
                                                       id="remember">
                                            @else
                                                <input type="checkbox" name="department[{{$department->id}}][read]"
                                                       id="remember">
                                            @endif
                                            <span>@lang('leggi')</span>
                                        </label>
                                        <label class="form-check-label pure-material-checkbox">
                                            @if($role = $department->user()->where('user_id',$user->id)->first())
                                                <input type="checkbox"
                                                       {{$role->listen? 'checked':''}} name="department[{{$department->id}}][listen]"
                                                       id="remember">
                                            @else
                                                <input type="checkbox" name="department[{{$department->id}}][listen]"
                                                       id="remember">
                                            @endif
                                            <span>@lang('ascolta')</span>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <hr>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col text-right">
                                    <button type="submit" class="btn btn-info send-reply-ticket"><i
                                            class="material-icons">
                                            create </i> @lang('aggiorna preferenze')</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
