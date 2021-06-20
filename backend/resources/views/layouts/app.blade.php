<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">
</head>
<body>
    <div class="container py-5">
        <div id="example"></div>
    </div>
    <script src="{{ asset('/js/app.js') }}"></script>
</body>
</html>

<!-- <html>
    <head>
        <title>アプリ名 - @yield('title')</title>
    </head>
    <body>
        @section('sidebar')
            
        @show

        <div class="container">
            @yield('content')
        </div>
    </body>
</html> -->