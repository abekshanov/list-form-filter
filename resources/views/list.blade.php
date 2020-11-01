<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->

</head>
<body class="antialiased">
<div class="container-fluid">

    Фильтры <br>
    <form method="GET" action="{{route('cities.index')}}">
        <input name="city_name" @if(request()->get('city_name')) value="{{request()->get('city_name')}}" @endif placeholder="Название города">
        <input name="district_name" @if(request()->get('district_name')) value="{{request()->get('district_name')}}" @endif placeholder="Название района">
        <input type="submit">
        <a href="{{route('cities.index')}}">Сбросить </a>
    </form>
    <table border="1">
        <thead>
        <tr>
            <th>#id</th>
            <th>Название Города</th>
            <th>Транслит</th>
            <th>Название Района</th>
            <th>Транслит</th>
        </tr>

        </thead>
        <tbody>
        @foreach($cities as $city)
{{--            @foreach($city->districts as $district)--}}
                <tr>
                    <td>{{$city->id}}</td>
                    <td>{{$city->name}}</td>
                    <td>{{$city->translit_name}}</td>
                    <td>{{$city->district_name}}</td>
                    <td>{{$city->district_translit_name}}</td>
                </tr>
{{--            @endforeach--}}
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
