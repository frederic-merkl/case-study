<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benutzer: {{ $user->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/users.css') }}">
</head>

<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
    <header>
        <h1>Benutzer: {{ $user->name }}</h1>
    </header>

    <div>
        ID: {{ $user->id }}
    </div>
    <div>
        Name: {{ $user->name }}
    </div>
    <div>
        E-Mail: {{ $user->email }}
    </div>
    <div>
        Erstellt: {{ $user->created_at }}
    </div>
    <div>
        Aktualisiert: {{ $user->updated_at }}
    </div>

    <footer>
        <hr>
        <a href="{{ route('users.edit', $user) }}">Bearbeiten</a>
        <br>
        <a href="{{ route('users.index') }}">Zur Übersicht</a>
    </footer>
</body>

</html>
