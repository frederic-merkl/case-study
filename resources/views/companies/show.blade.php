<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $company->name }}</title>
</head>

<body>

    <header>
        <h1>{{ $company->name }}</h1>
        <hr>
    </header>

    <h2>Beschreibung</h2>
    <p>{{ $company->description }}</p>

    <h2>Details</h2>

    <p>Stadt: {{ $company->city }}</p>
    <p>Straße: {{ $company->street }}</p>
    <p>PLZ: {{ $company->zip_code }}</p>
    <p>Land: {{ $company->country }}</p>

    <p>Kontakt</p>
    <p>E-Mail: {{ $company->email }}</p>
    <p>Telefon: {{ $company->phone }}</p>
    <p>Website: {{ $company->website }}</p>

    <p>Mitarbeiterzahl: {{ $company->employee_size }}</p>

    <p>Company-ID: {{ $company->id }}</p>
    <p>User-ID: {{ $company->user_id }}</p>
    <p>Erstellt: {{ $company->created_at }}</p>
    <p>Aktualisiert: {{ $company->updated_at }}</p>

    <footer>
        <hr>
        <a href="{{ route("companies.index") }}">Unternehmen</a>
    </footer>

</body>

</html>