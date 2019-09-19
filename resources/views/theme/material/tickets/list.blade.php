@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="col-md-12">

                <form action="/new/ticket/open" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <div class="row">

                                <div class="col-md-6">
                                    <input name="subject" value="" class="form-control"
                                           placeholder="@lang('aggiungi un nuovo ticket nel sistema')" required>
                                </div>

                                <div class="col-md-3">
                                    <select class="form-control" name="department" required>
                                        @forelse(\App\Department::all() as $department)
                                            <option value="{{$department->id}}">@lang($department->title)</option>

                                        @empty
                                            <option>@lang('nessuno')</option>

                                        @endforelse

                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <button type="submit"
                                            class="btn btn-raised btn-outline-primary">@lang('apri nuovo ticket')</button>
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
                                <th scope="col"></th>
                                <th scope="col">@lang('informazioni')</th>
                                <th scope="col">@lang('stato')</th>
                                <th scope="col">@lang('ultima risposta')</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($tickets as $ticket)
                                @if($role = $ticket->department()->first()->user()->where('user_id', auth()->id())->first())
                                    @if($role->read > 0)
                                        @if(request()->is('tickets/working'))
                                            @if($ticket->replies()->exists())
                                                @if($ticket->replies()->orderBy('created_at', 'desc')->limit(1)->first()->user_id !== auth()->id())
                                                    @include("$component.ticket", $ticket)
                                                @endif
                                            @else
                                                @include("$component.ticket", $ticket)
                                            @endif
                                        @else
                                            @include("$component.ticket", $ticket)
                                        @endif
                                    @endif
                                @endif
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
