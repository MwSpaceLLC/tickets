@extends("$layouts.app")

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">

                @if(!auth()->user()->active)
                    <div class="bd-callout bd-callout-warning">
                        <h4 id="conveying-meaning-to-assistive-technologies">@lang('attivazione permessi account')</h4>
                        <p>@lang('Devi aspettare che un amministratore di sistema attivi il tuo account')</p>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <div class="jumbotron">
                            <h1 class="display-4">@lang('Grazie per aver scelto Tickets')</h1>
                            <p class="lead">@lang('Questo piccolo amico ti aiuterà a gestire il tuo lavoro in maniera semplice e gratuita')</p>
                            <hr class="my-4">
                            <p>@lang('Ci scusiamo per tutte le funzioni che non ci sono, ma vi preghiamo di capire che è una distro open Source')</p>
                            <p class="lead">
                                <a class="btn btn-primary btn-lg" href="/https://github.com/MwSpaceLLC" target="_blank"
                                   role="button">@lang('githu page')</a>
                            </p>
                        </div>

                        <canvas id="home-charts"
                                data-title="@lang('Tutti i ticket')"
                                data-colors="#4caf50,#6c757d"
                                data-labels="@lang('Aperti'), @lang('Chiusi'), @lang('vuoti')"
                                data-set="{{\App\Tickets::where('status',1)->count()}},
                                {{\App\Tickets::where('status',2)->count()}},
                                {{\App\Tickets::doesnthave('replies')->count()}}"
                                class="col" width="100%"></canvas>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
