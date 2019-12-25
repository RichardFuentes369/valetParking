<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet"> <!--Añadimos el css generado con webpack-->
</head>
<body>
    <div id="app">
        <navt></navt>
        <br>
        <div class="col-sm-12">
            <div class="row">
                <navl></navl>
                <div class="pl-4 col-sm">
                  @if(Auth::check() == false)
                    <login></login>
                  @else
                    <h1>ud esta logueado</h1>
                  @endif
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>
</html>
