<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>HOME OBJECTS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

</head>
<body>


<div class="flex-center position-ref full-height">

    <div class="content">

        <div class="title m-b-md">
            <h3>Home objects</h3>
            <h4>Years</h4>
            {{$years}}
            <h4>Cities</h4>
            {{$cities}}
            <h4>Streets</h4>
            {{$streets}}
            <h4>Objects</h4>
            {{$objects}}
            <input type="text">
        </div>

    </div>
</div>
</body>
</html>
