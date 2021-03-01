<!doctype html>
<html>
<head>
    <meta charset="utf-8">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <h1>{{ config('app.name')}}</h1>
    <p>
        <a class="btn btn-primary" href="{{route('fetch')}}">{{__('index.actions.fetch')}}</a>
    </p>
    <table>
        <tr>
            <th>{{__('index.table.id')}}</th>
            <th>{{__('index.table.title')}}</th>
        </tr>
        @foreach ($titles as $title)
        <tr>
            <td>{{$title->imdb_id}}</td>
            <td>{{$title->title}}</td>
        </tr>
    @endforeach
    </table>
    
</body>
</html>