<li class="m-3"><a class="btn btn-raised btn-outline-secondary" href="/tickets/working">@lang('attesa')</a></li>
<li class="m-3"><a class="btn btn-raised btn-outline-secondary" href="/tickets/open">@lang('aperti')</a></li>
<li class="m-3"><a class="btn btn-raised btn-outline-secondary" href="/tickets/closed">@lang('chiusi')</a></li>
<li class="m-3"><a class="btn btn-raised btn-outline-secondary" href="/settings">@lang('impostazioni')</a></li>

@if(Auth::user()->role === 1)
    <li class="m-3"><a class="adm btn btn-raised btn-outline-secondary" href="/users">@lang('utenti')</a></li>
    <li class="m-3"><a class="adm btn btn-raised btn-outline-secondary" href="/departments">@lang('dipartimenti')</a></li>
@endif
