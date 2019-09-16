@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            @if(Auth::user()->active)
                @include('component.sidebar')
            @endif

                <div class="col-md-10">
                <div class="card">
                    <div class="card-header">@lang('settings')</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        @lang('Devi aspettare che un amministratore di sistema attivi il tuo account')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
