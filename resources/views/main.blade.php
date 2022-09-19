<!DOCTYPE html>
<html>
<head>
    <title>My-restauration App</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
</head>
<body>
    @include('partials.header')
    <div class="main">
    <h2>Feeling hungry ! you're in the right Place !</h2>
    <div class="container">
        <br>
        @yield('content')
    </div>
    </div>
    @include('partials.footer')
</body>
</html>