<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategorien-Übersicht</title>
</head>

<body>
    <header>
        <h1>Kategorien</h1>
        <p>
            <a href="{{ route("categories.create") }}">Neue Kategorie erstellen</a>
        </p>
    </header>

    @if ($categories->isEmpty())
        <p>Es wurden keine Kategorien gefunden.</p>
    @else
        <ul>
            @foreach ($categories as $category)
                <li>
                    <a href="{{ route("categories.show", ["category" => $category]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <footer>
        <hr>
        <a href="{{ route("jobs.index") }}">Stellenangebote</a>
        <br>
        <a href="{{ route("categories.index") }}">Kategorien</a>
        <br>
        <a href="{{ route("users.index") }}">Benutzer</a>
    </footer>
</body>

</html>