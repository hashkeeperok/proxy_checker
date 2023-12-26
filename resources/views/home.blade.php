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
    <form action="{{ route('proxy_check_list.index') }}" method="POST">
        @csrf
        <label for="proxy_list" class="form-label">Список прокси</label>
        <textarea class="form-control @error('proxy_list') is-invalid @enderror" id="proxy_list" name="proxy_list"
                  rows="6">{{old('proxy_list')}}</textarea>
        @error('proxy_list')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <input class="btn btn-primary mt-3 float-end" type="submit" value="Проверить"/>
    </form>
</div>

<table class="table">
    <thead>
    <tr>
        <th>ID</th>
        <th>Дата проверки</th>
        <th>Всего проксей</th>
        <th>Перейти</th>
    </tr>
    </thead>
    <tbody>
    @foreach($proxyCheckLists as $proxyCheckList)
        <tr>
            <td>{{ $proxyCheckList->id }}</td>
            <td>{{$proxyCheckList->created_at}}</td>
            <td>{{$proxyCheckList->count}}</td>
            <td><a class="btn btn-success btn-sm"
                   href="{{ route('proxy_check_list.show', [ 'proxy_check_list' => $proxyCheckList->id ]) }}">
                    Перейти
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>

    {!! $proxyCheckLists->links() !!}
</table>
</body>
</html>
