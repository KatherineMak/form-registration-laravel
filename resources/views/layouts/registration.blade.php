<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Conference') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html, body {
            background-color: #d4e7fa;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 400;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            /*text-align: center;*/
            text-size: 20px;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .main {
            margin-top: 50px;
        }
        .forms {
            margin: 20px;
        }
        #btn, #btn_1 {
            margin: 0 0 0 50px;
            float: right;
        }
        .share {
            float: left;
            margin: 0 30px 0 30px;
        }
        #birthday {
            background:white;
        }
    </style>
    @yield('script')
</head>
<body>
<div class="flex-center position-ref">
    @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    @endif
        <div class="container main col-12">
            <div class="row">
                <div class="col-12">
                    <div id="wrapper-9cd199b9cc5410cd3b1ad21cab2e54d3">
                        <div class="map" id="map-9cd199b9cc5410cd3b1ad21cab2e54d3"></div><script>(function () {
                                var setting = {"height":450,"width":3000,"zoom":17,"queryString":"7060 Hollywood Blvd, Los Angeles, Los Angeles, Калифорния, США","place_id":"ChIJcyjI5CC_woAR29om2VRXARQ","satellite":false,"centerCoord":[34.10139291075232,-118.34368570000004],"cid":"0x14015754d926dadb","cityUrl":"/us/ca/west-hollywood-10300","id":"map-9cd199b9cc5410cd3b1ad21cab2e54d3","embed_id":"76012"};
                                var d = document;
                                var s = d.createElement('script');
                                s.src = 'https://1map.com/js/script-for-user.js?embed_id=76012';
                                s.async = true;
                                s.onload = function (e) {
                                    window.OneMap.initMap(setting)
                                };
                                var to = d.getElementsByTagName('script')[0];
                                to.parentNode.insertBefore(s, to);
                            })();</script><a href="https://1map.com/map-embed?embed_id=76012">1map.com</a>
                    </div>
                </div>
            </div>
            <div class="row forms">
                <div class="col-12">
                    @yield('content')
                </div>
            </div>
        </div>
</div>
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<!-- Подключение jQuery плагина Masked Input -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="{{ asset('js/jquery.maskedinput.min.js') }}"></script>
<script src="{{ asset('js/ajaxForm.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function($) {

        $(document).on('click', '#birthday', function () {
            $("#birthday").datepicker({
                showOn: 'focus',
                altFormat: "mm/dd/yy",
                dateFormat: "mm/dd/yy",
                minDate: '12/31/1940',
                maxDate: '+0m +0w',
                changeMonth: true,
                changeYear: true,
                yearRange: '1950:2019'
            }).focus();
        }).on('focus', '#birthday', function () {
            $("#birthday").mask('99/99/9999');
        });

        $("#phone").mask("+9(999) 999-9999");
    });
</script>
</body>
</html>