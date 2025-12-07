<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neues Jobangebot anlegen</title>
</head>

<body>
    <div>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            <h2>Neues Jobangebot anlegen</h2>

            <div>
                <label for="title">Titel</label>
                <input id="title" type="text" name="title" required>
            </div>

            <div>
                <label for="company_id">Unternehmen</label>
                <select id="company_id" name="company_id" required>
                    <option value="">Firma auswählen</option>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="category_id">Kategorie</label>
                <select id="category_id" name="category_id" required>
                    <option value="">Kategorie auswählen</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="contact_email">E-Mail</label>
                <input id="contact_email" type="email" name="contact_email" required>
            </div>

            <div>
                <label for="description">Beschreibung</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>

            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route('jobs.index') }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>