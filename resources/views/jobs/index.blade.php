<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-Übersicht</title>
</head>

<body>
    <header>
        <h1>Aktive Stellenangebote</h1>
        <p>
            <a href="{{ route("jobs.create") }}">Neuen Job erstellen</a>
        </p>
    </header>

    @if ($jobs->isEmpty())
        <p>Es wurden keine aktiven Jobs gefunden.</p>
    @else
        <ul>
            @foreach ($jobs as $job)
                <li>
                    <a href="{{ route("jobs.show", ["job" => $job]) }}">
                        {{ $job->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <footer>
        <hr>
        <a href="{{ route("jobs.index") }}">Job-Übersicht</a>
        <br>
        <a href="{{ route("categories.index") }}">Kategorien-Verwaltung</a>
        <br>
        <a href="{{ route("companies.index") }}">Firmen-Verwaltung</a>
    </footer>
</body>

</html>