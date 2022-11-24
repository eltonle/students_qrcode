<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>authentication certification</title>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">


</head>

<body>
    <div class="containerr">
        <div>
            <img src="{{ asset('images/logo-localhost-academy.png') }}" alt="" width="150px" height="150px">
        </div>
    </div>
    <div class="container">
        <div>
            <div>
                <p> <span class="name">Mr.{{ $result->name }}</span> a suivi avec succès la formation en <span
                        class="filiere">{{$result->formation->name}}</span> allant du <span class="date">{{
                        $result->section->name }}</span>
                    au sein du groupe <span class="color1">LocalHost</span> <span class="color2">Academic</span> .</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div>
            <div>
                <i class="fa fa-check-circle"></i>
            </div>
        </div>
    </div>
</body>

</html>