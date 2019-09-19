# *{{auth()->user()->name}}* @lang('scrive nel ticket') [{{$ticket->subject}}]({{url("/ticket/$ticket->id")}} "{{$ticket->subject}}"):

@foreach(unserialize($ticket->replies()->orderBy('created_at', 'desc')->limit(1)->first()->row) as $key => $rowclear)
    @switch($rowclear['type'])

        @case('image')
        <img src="{{$rowclear['data']['file']['url']}}" width="100%">
        <br>
        <br>
        @break

        @case('header')
        <h2>{!! $rowclear['data']['text'] !!}</h2>
        @break

        @case('paragraph')
        <p>{!! $rowclear['data']['text'] !!}</p>
        @break

        @case('linkTool')

        <div class="card">
            <h6 class="card-headers">
                <img src="{!! $rowclear['data']['meta']['image']['url'] !!}" width="125px">
                {!! $rowclear['data']['meta']['title'] !!}
            </h6>
            <div class="card-body">
                <p class="card-text">{!! $rowclear['data']['meta']['description'] !!}</p>
                <a href="{!! $rowclear['data']['link'] !!}" target="_blank"
                   class="btn btn-primary">@lang('apri link')</a>
            </div>
        </div>
        <br>

        @break

        @case('attaches')

        <div class="alert alert-dark" role="alert">

            <div class="row">
                <div class="col-md-12">
                    <h5> {{$rowclear['data']['title']}}</h5>
                </div>
                <div class="col-md-2">
                    <a href="#" class="btn btn-info "><i class="material-icons">
                            cloud_download </i></a>
                </div>

            </div>
        </div>
        <br>

        @break

        @default

        {!! var_dump($rowclear) !!}

    @endswitch

@endforeach

@lang('Sei in ascolto su') {{$ticket->department()->first()->title}}
