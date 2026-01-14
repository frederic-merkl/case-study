<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
</head>

<body>
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <header>
        <h1>{{ $job->title }}</h1>
        <hr>
    </header>

    <h2><u>Beschreibung</u></h2>
    <p>{{ $job->description }}</p>

    <h2><u>Details</u></h2>

    <p><b>Status:</b> {{ $job->is_active ? 'Aktiv' : 'Inaktiv' }}</p>

    <p><b>Gehalt:</b>
        {{ $job->min_salary ? $job->min_salary : 'N/A' }} -
        {{ $job->max_salary ? $job->max_salary : 'N/A' }}
    </p>

    <p><b>Ort:</b> {{ $job->location }}</p>
    <p><b>Kategorien:</b>
        @foreach ($job->categories as $category)
            {{ $category->name }}
        @endforeach
    </p>

    <p><b>Tags:</b></p> {{ $job->tags }}

    <p><b>Erstellt:</b> {{ $job->created_at }}</p>
    <p><b>Aktualisiert:</b> {{ $job->updated_at }}</p>
    <p><b>Ablaufdatum:</b> {{ $job->expires_at }}</p>
    <p><b>Job-ID:</b> {{ $job->id }}</p>
    <p><b>User-ID:</b> {{ $job->user_id }}</p>

    <h2><u>Kontakt</u></h2>
    <p><b>Ansprechpartner:</b> {{ $job->contact_name }}</p>
    <p><b>E-Mail:</b> {{ $job->contact_email }}</p>
    <p><b>Telefon:</b> {{ $job->contact_phone }}</p>
    <p><b>Company:</b> {{ $job->company->name }}</p>
    <p><b>Website:</b> {{ $job->website }}</p>


    <footer>
        <hr>
        <a href="{{ route('jobs.edit', $job) }}">Bearbeiten</a>
        <br>
        <a href="{{ route('jobs.index') }}">Zur Übersicht</a>
    </footer>

</body>

</html>
