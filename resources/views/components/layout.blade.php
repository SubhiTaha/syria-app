<!DOCTYPE html>
<html>
<head>
    <title>{{$title}}</title>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <link href="{{ asset('css/style.css') }}?v={{ time() }}" rel="stylesheet" />
</head>
<body>
<nav>
    <ul>
        <li><a href="/cities">Cities to visit</a></li>
        <li><a href="/cities/create">Add new City</a></li>
        <li><a href="/cities/about">About Syria</a></li>
    </ul>
</nav>
{{$slot}}
</body>

</html>
