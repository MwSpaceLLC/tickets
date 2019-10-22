<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
    <title>Entity</title>

    <style type="text/css">

        div, p, a, li, td {
            -webkit-text-size-adjust: none;
        }

        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .ReadMsgBody {
            width: 100%;
            background-color: #ffffff;
        }

        .ExternalClass {
            width: 100%;
            background-color: #ffffff;
        }

        body {
            width: 100%;
            height: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
        }

        html {
            width: 100%;
        }

        @font-face {
            font-family: 'proxima_nova_softmedium';
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_medium-webfont.eot');
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_medium-webfont.eot?#iefix') format('embedded-opentype'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_medium-webfont.woff') format('woff'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_medium-webfont.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'proxima_nova_softregular';
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_regular-webfont.eot');
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_regular-webfont.eot?#iefix') format('embedded-opentype'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_regular-webfont.woff') format('woff'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_regular-webfont.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }


        @font-face {
            font-family: 'proxima_nova_softsemibold';
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_semibold-webfont.eot');
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_semibold-webfont.eot?#iefix') format('embedded-opentype'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_semibold-webfont.woff') format('woff'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_semibold-webfont.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;

        }

        @font-face {
            font-family: 'proxima_nova_softbold';
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_bold-webfont.eot');
            src: url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_bold-webfont.eot?#iefix') format('embedded-opentype'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_bold-webfont.woff') format('woff'), url('http://rocketway.net/themebuilder/template/templates/entity/font/mark_simonson_-_proxima_nova_soft_bold-webfont.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;

        }


        p {
            padding: 0 !important;
            margin-top: 0 !important;
            margin-right: 0 !important;
            margin-bottom: 0 !important;
            margin-left: 0 !important;
        }

        .headerScale img {
            width: 600px;
            height: auto !important;
        }

        .header img {
            width: 347px;
            height: auto !important;
        }

        .icons img {
            width: 38px;
            height: auto !important;
        }

        .icons30 img {
            width: 30px !important;
            height: 30px !important;
        }

        .icons38 img {
            width: 38px !important;
            height: auto !important;
        }

        .avatars100 img {
            width: 100px !important;
            height: auto !important;
        }

        .imageMobile img {
            width: 290px;
            height: auto !important;
        }

        .icon img {
            width: 14px !important;
            height: auto !important;
        }

        .icons43 img {
            width: 43px !important;
            height: auto !important;
        }

        .smallImages113 img {
            width: 113px !important;
        }

        .wordBreak {
            -ms-word-break: break-all;
            word-break: break-all;
            word-break: break-word;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            hyphens: auto;
        }

    </style>


    <!-- @media only screen and (max-width: 640px)
               {*/
               -->
    <style type="text/css"> @media only screen and (max-width: 640px) {
            body {
                width: auto !important;
            }

            table[class=full] {
                width: 100% !important;
                clear: both;
            }

            table[class=mobile] {
                width: 100% !important;
                padding-left: 20px;
                padding-right: 20px;
                clear: both;
            }

            table[class=fullCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            td[class=fullCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            td[class=textCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .headerBG {
                background-position: center center !important;
            }

            .erase {
                display: none;
            }

            table[class=header] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .header img {
                width: 347px !important;
                text-align: center !important;
                clear: both;
            }

            table[class=imageMobile] {
                width: 100%;
                text-align: center !important;
                clear: both;
            }

            table[class=icons38] {
                width: 100% !important;
                padding-left: 10px;
                padding-right: 10px;
                text-align: center !important;
                clear: both;
            }

            .icons38 img {
                width: 38px !important;
            }

            table[class=icons43] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .icons43 img {
                width: 43px !important;
            }

            table[class=headerScale] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .headerScale img {
                width: 100% !important;
                height: auto;
            }

            .font40 {
                text-align: center !important;
            }

            .headerBG {
                background-position: center center !important;
            }

            td[class=w30] {
                width: 40px !important;
            }

            table[class=icon] {
                width: 100%;
                text-align: center !important;
                clear: both;
            }

            td[class=h40] {
                height: 40px !important;
            }

            td[class=wordBreak] {
                text-align: center !important;
                -ms-word-break: break-all;
                word-break: break-all;
                word-break: break-word;
                -webkit-hyphens: auto;
                -moz-hyphens: auto;
                hyphens: auto;
            }

            .w10 {
                width: 40px !important;
            }

            td[class=centerMiddle] {
                text-align: center !important;
            }

            .w50Left {
                width: 58% !important;
                text-align: left !important;
            }

            .w50Right {
                width: 42% !important;
                text-align: right !important;
            }


        } </style>
    <!--

    @media only screen and (max-width: 479px)
               {
               -->
    <style type="text/css"> @media only screen and (max-width: 479px) {
            body {
                width: auto !important;
            }

            table[class=full] {
                width: 100% !important;
                clear: both;
            }

            table[class=mobile] {
                width: 100% !important;
                padding-left: 20px;
                padding-right: 20px;
                clear: both;
            }

            table[class=fullCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            td[class=fullCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            td[class=textCenter] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .headerBG {
                background-position: center center !important;
            }

            .erase {
                display: none;
            }

            img[class=fullImage] {
                width: 100% !important;
                height: auto !important;
            }

            span[class=pad50] {
                padding: 40px !important;
            }

            td[class=w70] {
                width: 70% !important;
            }

            .headerBG {
                background-position: center center !important;
            }

            table[class=header] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .header img {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            table[class=imageMobile] {
                width: 100%;
                clear: both;
            }

            .imageMobile img {
                width: 90% !important;
                height: auto !important;
            }

            table[class=icons38] {
                width: 100% !important;
                padding-left: 10px;
                padding-right: 10px;
                text-align: center !important;
                clear: both;
            }

            .icons38 img {
                width: 38px !important;
            }

            table[class=icons43] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .icons43 img {
                width: 43px !important;
            }

            table[class=headerScale] {
                width: 100% !important;
                text-align: center !important;
                clear: both;
            }

            .headerScale img {
                width: 100% !important;
                height: auto;
            }

            .font40 {
                font-size: 40px !important;
                text-align: center !important;
                line-height: 46px !important;
            }

            .headerBG {
                background-position: center center !important;
            }

            td[class=w30] {
                width: 60px !important;
            }

            table[class=icon] {
                width: 100%;
                text-align: center !important;
                clear: both;
            }

            td[class=h40] {
                height: 40px !important;
            }

            td[class=wordBreak] {
                font-size: 40px !important;
                text-align: center !important;
                line-height: 46px !important;
                -ms-word-break: normal !important;
                word-break: normal !important;
                word-break: normal !important;
                -webkit-hyphens: normal;
                -moz-hyphens: normal;
                hyphens: normal;
            }

            .w10 {
                width: 40px !important;
            }

            td[class=centerMiddle] {
                text-align: center !important;
            }

            .w50Left {
                width: 62% !important;
                text-align: left !important;
            }

            .w50Right {
                width: 38% !important;
                text-align: right !important;
            }

        }


        } </style>

</head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
<!-- Wrapper 1 (Header + Nav) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full"
       style="background-color: rgb(255, 255, 255);">
    <tr>
        <td align="center"
            style="background-color: rgb(255,255,255); background-position: center center; background-repeat:no-preat!important; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover; background-repeat: no-repeat;"
            class="headerBG" id="BGheaderChange">


            <!-- Wrapper -->
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tr>
                    <td width="100%" align="center">

                        <!-- Start Nav -->
                        <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tr>
                                <td width="100%" height="15"></td>
                            </tr>
                            <tr>
                                <td width="100%" valign="middle" align="center">

                                    <!-- Logo -->
                                    <table width="150" border="0" cellpadding="0" cellspacing="0" align="left"
                                           class="fullCenter">
                                        <tr>
                                            <td height="80" valign="middle" width="100%" style="text-align: left;"
                                                class="fullCenter">
                                                <img src="{{url('/logo.jpg')}}"
                                                     width="100" height="auto"
                                                     style="width: 100px; height: auto;" alt="" border="0">
                                            </td>
                                        </tr>
                                    </table>

                                    <!-- Nav -->
                                    <table width="400" border="0" cellpadding="0" cellspacing="0" align="right"
                                           style="text-align: right; font-family: proxima_nova_softmedium, 'Myriad Pro', Helvetica, Arial, sans-serif; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; color: rgb(69,69,69);"
                                           class="fullCenter">
                                        <tr>
                                            <td height="80" valign="middle" width="33%"
                                                style="font-family: 'proxima_nova_softmedium', Myriad Pro, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;">
                                                <a href="{{url("ticket/{$ticket->id}")}}"
                                                   style="text-decoration: none; color: rgb(69,69,69);">@lang('Rispondi')</a>
                                            </td>
                                            <td valign="middle" width="33%"
                                                style="font-family: 'proxima_nova_softmedium', Myriad Pro, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;">
                                                <a href="#!"
                                                   style="text-decoration: none; color: rgb(69,69,69);">@lang('Segnala')</a>
                                            </td>
                                            <td valign="middle" width="33%"
                                                style="font-family: 'proxima_nova_softmedium', Myriad Pro, Helvetica, Arial, sans-serif; font-size: 13px; letter-spacing: 1px; text-transform: uppercase;">
                                                <a href="{{url("status/2/ticket/{$ticket->id}")}}"
                                                   style="text-decoration: none; color: rgb(69,69,69);">@lang('Chiudi')</a>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table><!-- End Nav -->

                    </td>
                </tr>
            </table><!-- End Wrapper -->

            </div>
        </td>
    </tr>
</table><!-- End Wrapper 1 -->

<!-- foreach cycle (2 Column - Image Left , Text Right) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
    <tr>
        <td width="100%" valign="top" align="center">


            <!-- Wrapper -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tr>
                    <td align="center">

                        <!-- Wrapper -->
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                            <tr>
                                <td width="100%" align="center">

                                    <!-- Text -->
                                    <table width="600" border="0" cellpadding="0" cellspacing="0" align="center"
                                           style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                           class="full">
                                        <tr>
                                            <td width="100%" height="25"></td>
                                        </tr>
                                        <tr>
                                            <td width="100%"
                                                style="font-size: 18px; color: rgb(8, 8, 8); text-align: left; font-family: proxima_nova_softmedium, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                class="textCenter">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="100%" height="15"></td>
                                        </tr>
                                        @foreach(unserialize($ticket->replies()->orderBy('created_at', 'desc')->limit(1)->first()->row) as $key => $rowclear)
                                            @switch($rowclear['type'])

                                                @case('image')
                                                <tr>
                                                    <td width="100%"
                                                        style="font-size: 14px; color: rgb(158, 158, 158); text-align: left; font-family: proxima_nova_softregular, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                        class="textCenter">
                                                        <img src="{{$rowclear['data']['file']['url']}}" width="100%">
                                                    </td>
                                                </tr>
                                                @break

                                                @case('header')
                                                <tr>
                                                    <td width="100%"
                                                        style="font-size: 14px; color: rgb(158, 158, 158); text-align: left; font-family: proxima_nova_softregular, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                        class="textCenter">
                                                        <h2>{!! $rowclear['data']['text'] !!}</h2>
                                                    </td>
                                                </tr>
                                                @break

                                                @case('paragraph')
                                                <tr>
                                                    <td width="100%"
                                                        style="font-size: 14px; color: rgb(158, 158, 158); text-align: left; font-family: proxima_nova_softregular, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                        class="textCenter">
                                                        <p>
                                                            {!! $rowclear['data']['text'] !!}
                                                        </p>
                                                    </td>
                                                </tr>
                                                @break

                                                @case('attaches')

                                                <tr>
                                                    <td width="100%"
                                                        style="font-size: 14px; color: rgb(158, 158, 158); text-align: left; font-family: proxima_nova_softregular, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                        class="textCenter">
                                                        <p>@lang('Allegato'): {{$rowclear['data']['title']}}</p>
                                                    </td>
                                                 </tr>
                                                @break

                                                @case('tiny')
                                                {!! $rowclear['data'] !!}
                                                @break

                                                @default

                                                <tr>
                                                    <td width="100%"
                                                        style="font-size: 14px; color: rgb(158, 158, 158); text-align: left; font-family: proxima_nova_softregular, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;"
                                                        class="textCenter">
                                                        {!! var_dump($rowclear) !!}
                                                    </td>
                                                </tr>

                                            @endswitch

                                        @endforeach

                                        <tr>
                                            <td width="100%" style="text-align: right; color: rgb(158, 158, 158)"
                                                height="65">
                                                <p>@lang('Scritto alle '){{date('H:i')}} @lang('il') {{date('d/m/y')}}
                                                    | @lang('autore'): {{ucfirst(auth()->user()->name)}} </p>
                                            </td>
                                        </tr>
                                    </table>

                                </td>
                            </tr>
                        </table><!-- End Wrapper 2 -->

                    </td>
                </tr>
            </table><!-- End Wrapper -->

            </div>
        </td>
    </tr>
</table><!-- foreach cycle -->


<!-- Wrapper 2 (Footer Social Icons) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
    <tr>
        <td width="100%" valign="top" align="center" style="background-color: rgb(69,69,69);">


            <!-- Start Subscribe Wrapper -->
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tr>
                    <td width="100%" height="30"></td>
                </tr>
                <tr>
                    <td width="100%" align="center">

                        <!-- Footer Text -->
                        <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="fullCenter"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;">
                            <tr>
                                <td width="100%" height="5"></td>
                            </tr>
                            <tr>
                                <td width="100%"
                                    style="font-size: 14px; color: rgb(255, 255, 255); text-align: center; font-family: proxima_nova_softmedium, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: top;">
                                    <p>
                                        @lang('Sei in ascolto sul dipartimento')
                                        <b> {{$ticket->department()->first()->title}}</b>
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td width="100%" height="20">
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table><!-- End Footer Text -->

            <!-- Start Social Icons -->
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tr>
                    <td width="100%" height="12"></td>
                </tr>
                <tr>
                    <td width="100%">

                        <!-- Social Icons Left -->
                        <table width="298" border="0" cellpadding="0" cellspacing="0" align="left"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="icon">
                            <tr>
                                <td width="100" class="w30"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon1.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="40"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon2.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="40"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon3.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="18" class="w30"></td>
                            </tr>
                        </table>

                        <!-- Space -->
                        <table width="1" border="0" cellpadding="0" cellspacing="0" align="left"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="full">
                            <tr>
                                <td width="100%" height="10" class="h40">
                                </td>
                            </tr>
                        </table><!-- End Space -->

                        <!-- Social Icons Left -->
                        <table width="298" border="0" cellpadding="0" cellspacing="0" align="right"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="icon">
                            <tr>
                                <td width="18" class="w30"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon4.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="40"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon5.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="40"></td>
                                <td width="14" style="text-align: center;">
                                    <a href="#" style="text-decoration: none;"><img
                                                src="{{url('')}}/mail/theme/enity/images/social_icon6.png" width="14"
                                                height="auto;" alt="" border="0" style="width: 14px;"></a>
                                </td>
                                <td width="100" class="w30"></td>
                            </tr>
                        </table>

                        <!-- Space -->
                        <table width="100" border="0" cellpadding="0" cellspacing="0" align="right"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="full">
                            <tr>
                                <td width="100%" height="1">
                                </td>
                            </tr>
                        </table><!-- End Space -->

                    </td>
                </tr>
            </table><!-- End Social Icons -->

            <!-- Space -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                <tr>
                    <td width="100%" height="30">
                    </td>
                </tr>
            </table><!-- End Space -->

            </div>
        </td>
    </tr>
</table><!-- End Wrapper 2 -->
<!-- Wrapper 2 (Footer) -->
<table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
    <tr>
        <td width="100%" valign="top" align="center">

            <!-- Start Footer Wrapper -->
            <table width="600" border="0" cellpadding="0" cellspacing="0" align="center" class="mobile">
                <tr>
                    <td width="100%" height="20"></td>
                </tr>
                <tr>
                    <td width="100%" align="center">

                        <!-- Copyright -->
                        <table width="250" border="0" cellpadding="0" cellspacing="0" align="left"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                               class="fullCenter">
                            <tr>
                                <td height="60" width="100%"
                                    style="font-size: 12px; color: rgb(255, 255, 255); text-align: left; font-family: proxima_nova_softmedium, Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: middle;"
                                    class="textCenter">
                                    <p>Copyright © {{date('Y')}} {{config('app.name')}}</p>
                                </td>
                            </tr>
                        </table>

                        <!-- Nav -->
                        <table width="340" border="0" cellpadding="0" cellspacing="0" align="right"
                               style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt; text-align: right;"
                               class="fullCenter">
                            <tr>
                                <td height="60" valign="middle" width="33%"
                                    style="font-size: 12px; color: #533f73; text-align: center; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: middle;">
                                    <!--subscribe--><a href="#"
                                                       style="text-decoration: none; color: rgb(255, 255, 255);">Unsubscribe</a>
                                    <!--unsub-->
                                </td>
                                <td valign="middle" width="33%"
                                    style="font-size: 12px; color: #533f73; text-align: center; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: middle;">
                                    <a href="#" style="text-decoration: none; color: rgb(255, 255, 255);">Privacy</a>
                                </td>
                                <td valign="middle" width="33%"
                                    style="font-size: 12px; color: #533f73; text-align: center; font-family: 'proxima_nova_softmedium', Helvetica, Arial, sans-serif; line-height: 24px; vertical-align: middle;">
                                    <a href="#" style="text-decoration: none; color: rgb(255, 255, 255);">Contact</a>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
            </table><!-- End Footer -->

            <!-- Space -->
            <table width="100%" border="0" cellpadding="0" cellspacing="0" align="center" class="full">
                <tr>
                    <td width="100%" height="20">
                    </td>
                </tr>
                <tr>
                    <td width="100%" height="1">
                    </td>
                </tr>
            </table><!-- End Space -->

            </div>
        </td>
    </tr>
</table><!-- End Wrapper 2 -->
</div>
</body>
</html>
<style>body {
        background: none !important;
    } </style>
