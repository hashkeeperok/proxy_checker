<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="antialiased container-md">
<h1> Proxy checker </h1>
<div class="mb-3">
    <table class="table">
        <thead>
        <tr>
            <th>IP:PORT</th>
            <th>Тип прокси</th>
            <th>ГЕО</th>
            <th>Уровень</th>
            <th>Доступность прокси</th>
            <th>Время отклика</th>
            <th>Реальный IP</th>
        </tr>
        </thead>
        <tbody>
        @foreach($proxyChecks as $check)
            <tr>
                <td>{{$check->ip_port}}</td>
                <td>{{\App\Enums\ProxyTypeEnum::names()[$check->type]}}</td>
                <td>{{$check->location}}</td>
                <td>{{$check->level}}</td>
                <td>{{$check->is_available}}</td>
                <td>{{$check->timeout}}</td>
                <td>{{$check->real_ip}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $proxyChecks->links() !!}
</div>
</body>
</html>
