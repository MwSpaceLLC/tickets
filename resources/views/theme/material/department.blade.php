@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                <div class="card">
                    <form action="/department/{{$department->id}}/update" method="post">
                        @csrf
                        <div class="card-header">
                            <h3 class="">
                                <a href="/departments"
                                   class="btn btn-sm">
                                    <i class="material-icons">
                                        reply
                                    </i>
                                </a>
                                <div class="avatar av-role bg-dark text-light">
                                    <span>{{Str::limit($department->title, 1, '')}}</span>
                                </div>
                                {{$department->title}}<br>
                                {{$department->description}}</h3>
                        </div>
                        <hr>
                        <div class="card-body">
                            <h3>@lang('Gestione ruoli')</h3>
                            @foreach(\App\User::paginate(8) as $user)
                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <p>{{$user->email}}</p>
                                    </div>
                                    <div class="col flex-center">

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
