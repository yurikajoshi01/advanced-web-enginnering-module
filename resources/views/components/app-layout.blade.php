@extends ('layouts.app')

@section('content')
    <html>
<head>
    <title>Laravel</title>
</head>
<body>

    <br/>
    <h1>Welcome!</h1>

    {{$slot}}
</body>
    </html>

@endsection
