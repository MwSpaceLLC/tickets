@extends("$layouts.app")

@section('content')
    @if(auth()->user()->admin())
        @include("$component.admin-setting")
    @else
        @include("$component.user-setting")
    @endif
@endsection