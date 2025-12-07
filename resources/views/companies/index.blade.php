<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unternehmens-Übersicht</title>
</head>

<body>
    <header>
        <h1>Unternehmen</h1>
        <p>
            <a href="{{ route("companies.create") }}">Neues Unternehmen anlegen</a>
        </p>
    </header>

    @if ($companies->isEmpty())
        <p>Es wurden keine Unternehmen gefunden.</p>
    @else
        <ul>
            @foreach ($companies as $company)
                <li>
                    <a href="{{ route("companies.show", ["company" => $company]) }}">
                        {{ $company->name }}
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