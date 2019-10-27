<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div id="accordion">

                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne"
                                    aria-expanded="true" aria-controls="collapseOne">
                                @lang('Pipe Settings') (smtp auth for mail reply)
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">

                            <table class="table">
                                <thead class="head-black">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">@lang('host')</th>
                                    <th scope="col">@lang('username')</th>
                                    <th scope="col">@lang('creazione')</th>
                                    <th scope="col">@lang('status')</th>
                                    <th scope="col">@lang('dipartimento')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(\App\Pipe::paginate(8) as $pipe)
                                    <tr>
                                        <th scope="row">{{$pipe->id}}</th>
                                        <td>{{$pipe->host}}</td>
                                        <td><b>{{$pipe->username}}</b></td>
                                        <td>{{$pipe->created_at->diffForHumans()}}</td>

                                        <td>
                                            <label class="pure-material-switch"
                                                   onchange="location.href='/pipe/{{$pipe->id}}/status/{{$pipe->status}}'">
                                                <input type="checkbox" {{$pipe->status?'checked':''}}>
                                                <span></span>
                                            </label>
                                        </td>
                                        <td>
                                            <select onchange="location.href='/pipe/{{$pipe->id}}/department/'+this.value"
                                                    class="custom-select d-block w-100" id="encryption"
                                                    name="encryption"
                                                    required="">
                                                @if(!$pipe->department()->first())
                                                    <option selected disabled>--nessuno--</option>
                                                @endif
                                                @foreach(\App\Department::all() as $department)
                                                    <option {{$department->mail_id === $pipe->id?'selected':''}} value="{{$department->id}}">{{$department->title}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>


                            <form class="needs-validation" novalidate="" method="post" action="/mail/add/pipe">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label for="username">Relay Server <b>host</b></label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="host" name="host"
                                                   placeholder="smtp.mailtrap.io"
                                                   required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="username">Relay Server <b>port</b> (pop3) </label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="host" name="port"
                                                   placeholder="995" value="995"
                                                   required="">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label for="firstName">Username</label>
                                        <input type="text" class="form-control" id="username" name="username"
                                               placeholder="smtp@domain.com" value=""
                                               required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="lastName">Password</label>
                                        <input type="text" class="form-control" id="password" name="password"
                                               placeholder="AuKm1m;stMv%" value=""
                                               required="">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label for="state">Encryption</label>
                                        <select class="custom-select d-block w-100" id="encryption" name="encryption"
                                                required="">
                                            <option value="ssl">Use SSL</option>
                                            <option value="tls">Use TLS</option>
                                            <option value="starttls">Use STARTTLS (alias TLS)</option>
                                            <option value="notls">Use NoTLS</option>
                                            <option value="false">Disable encryption</option>
                                        </select>
                                        <div class="invalid-feedback">
                                            Please provide a valid state.
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Add new piper account
                                </button>
                            </form>


                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                    aria-expanded="false" aria-controls="collapseTwo">
                                Cron <b>job</b> settings
                            </button>
                            <a class="btn btn-info btn-sm _blank" href="/http/cron/invoke" target="_blank">http test</a>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body row" style="zoom: 1.5">
                            <span class="col-md-2"><b>* * * * *</b></span>
                            <span class="col"><input style=" width: 100%; "
                                                     value="cd {{base_path()}} && php tik schedule:run >> /dev/null 2>&1"
                                                     readonly></span>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                                    aria-expanded="false" aria-controls="collapseThree">
                                MAIL TEMPLATE SETTING
                            </button>

                            <a class="btn btn-info btn-sm _blank" href="/http/test/mail" target="_blank">http test</a>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad
                            squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                            nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                            single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft
                            beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice
                            lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you
                            probably haven't heard of them accusamus labore sustainable VHS.
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>