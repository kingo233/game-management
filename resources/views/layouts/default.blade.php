<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <title>@yield('title','')-网游后端管理系统</title>
    </head>
    <body>
        @include('layouts._header')
        <div class="container">
            <div class="offset-md-1 col-md-10">
                @include('shared._messages')
                @yield('content')
                @include('layouts._footer')
            </div>
        </div>
    </body>
    <script src="{{ mix('js/app.js') }}"></script>
</html>