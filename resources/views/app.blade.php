<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <!--Añadimos el css generado con webpack-->
</head>

<body>
    <div id="app">
        @if(Auth::check() == false)
          {{-- si no esta logueado muestro --}}
          <navi></navi>
        @else
          {{-- si esta logueado muestro --}}
          <navs></navs>
        @endif
        <br>
        <div class="col-sm-12">
            <div class="row">
                {{-- si esta logueado muestro dependiendo del perfil --}}
                @if(Auth::check() == true)
                  @if(Auth::user()->id_rol == 1)
                    <navla></navla>
                  @else
                    <navle></navle> 
                  @endif
                @endif
                <div class="pl-4 col-sm">
                    <router-view></router-view>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</body>

</html>
