<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>File Manager</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <script src="{{ asset('js/main.js') }}" defer></script>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}" defer></script>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container">
    <h5>File Manager</h5>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
        </tr>
        </thead>
        <tbody>
        Path: {{app('request')->input('directory')}}

        @if(app('request')->has('directory') == 1)
            @if(app('request')->input('directory') != "public")
                @php
                    $directory = "";
                    $prepare_directory = explode('/', app('request')->input('directory'), -1);

                    for ($i = 0; $i <= count($prepare_directory) - 1; $i++) {
                        if ($directory == ""){
                             $directory .= $prepare_directory[$i];
                        }else{
                             $directory .= "/" . $prepare_directory[$i];
                        }
                    }
                @endphp
                <tr>
                    <th><a href="/?directory={{$directory}}">..</a></th>
                </tr>
            @endif
        @endif
        @foreach($directories as $directory)
            @php
                $reverseString = explode('/', strrev($directory));
                $result = strrev($reverseString[0]);
            @endphp
            <tr>
                <th><a href="/?directory={{$directory}}">{{$result}}</a></th>
            </tr>
        @endforeach
        @foreach($files as $file)
            @php
                $reverseString = explode('/', strrev($file));
                $result = strrev($reverseString[0]);
            @endphp
            <tr>
                <th>
                    <div style="cursor:pointer;" ondblclick="openFile('{{$file}}')">{{$result}}</div>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
