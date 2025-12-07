<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorie: {{ $category->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
</head>

<body>

    <header>
        <h1>Kategorie: {{ $category->name }}</h1>
    </header>

    <div>
        ID: {{ $category->id }}
    </div>
    <div>
        Name: {{ $category->name }}
    </div>
    <div>
        Erstellt: {{ $category->created_at }}
    </div>
    <div>
        Aktualisiert: {{ $category->updated_at }}
    </div>

    <footer>
        <hr>
        <a href="{{ route('categories.edit', $category) }}">Bearbeiten</a>
        <br>
        <a href="{{ route('categories.index') }}">Zur Übersicht</a>
    </footer>

</body>

</html>