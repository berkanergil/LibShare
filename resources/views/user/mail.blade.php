<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Mail</title>
</head>
<body>
    <h1 style="color: purple">{{ $request->name }}:</h1>

    <p>{{ $request->message }}</p>

    <ul>
        <li>
            @isset($request->question)
                {{ $request->question }}
            @endisset
        </li>
        <li>
            @isset($request->suggestion)
                {{ $request->suggestion }}
            @endisset
        </li>
        <li>
            @isset($request->other)
                {{ $request->other }}
            @endisset
        </li>
    </ul>
</body>
</html>