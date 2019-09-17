<div class="btn-group">
    <button class="btn bmd-btn-icon dropdown-toggle" type="button" id="ex2" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
        <i class="material-icons">more_vert</i>
    </button>
    <div class="dropdown-menu dropdown-menu-left" aria-labelledby="ex2">
        <a class="dropdown-item" href="/tickets/working">@lang('tickets da elaborare')</a>
        <a class="dropdown-item" href="/tickets/open">@lang('tickets aperti')</a>
        <a class="dropdown-item" href="/tickets/closed">@lang('tickets chiusi')</a>
        @if(Auth::user()->role === 1)
            <a class="adm dropdown-item" href="/users">@lang('Lista Utenti')</a>
            <a class="adm dropdown-item" href="/departments">@lang('Dipartimenti')</a>
        @endif
        <a class="dropdown-item" href="/settings">@lang('impostazioni')</a>
    </div>
</div>
