<!DOCTYPE html>
<html lang="{{ str_replace('_','-',app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{csrf_token()}}">
    <title>{{config('app.name','AWE Example')}}</title>
    <script src = "{{asset('js/my.js')}}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,300;0,400;1,200&display=swap" rel="stylesheet">

</head>
<body>
    <h1>Basic Example</h1>
    <div class="product-list">
        @yield('content')
    </div>
</body>
</html>