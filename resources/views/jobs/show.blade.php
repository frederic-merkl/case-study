<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }}</title>
</head>

<body>

    <header>
        <h1>{{ $job->title }}</h1>
        <p>{{ $job->company }}</p>
        <hr>
    </header>

    <h2>Beschreibung</h2>
    <p>{{ $job->description }}</p>

    <h2>Details</h2>

    <p>Status: {{ $job->is_active ? "Aktiv" : "Inaktiv" }}</p>

    <p>Gehalt:
        {{ $job->min_salary ? $job->min_salary : "N/A" }} -
        {{ $job->max_salary ? $job->max_salary : "N/A" }}
    </p>

    <p>Ort: {{ $job->location }}</p>
    <p>Ablaufdatum: {{ $job->expires_at }}</p>

    <p>Kontakt</p>
    <p>Ansprechparnter: {{ $job->contact_name }}</p>
    <p>E-Mail: {{ $job->contact_email }}</p>
    <p>Telefon: {{ $job->contact_phone }}</p>


    <p>Job-ID: {{ $job->id }}</p>
    <p>Company-ID: {{ $job->company_id }}</p>
    <p>User-ID: {{ $job->user_id }}</p>
    <p>Erstellt: {{ $job->created_at }}</p>
    <p>Aktualisiert: {{ $job->updated_at }}</p>

    <footer>
        <hr>
        <a href="{{ route("jobs.index") }}">Jobs</a>
    </footer>

</body>

</html>