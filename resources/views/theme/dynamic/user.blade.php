@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if(auth()->user()->active)
                @include("$component.sidebar")
            @endif

            <div class="col-md-10">

                <div class="card">
                    <div class="card-body">

                        {{$user->id}}

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
