<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stellenangebot erstellen</title>
    <link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
</head>

<body>
    <div>
        <form action="{{ route('jobs.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
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
                <label for="min_salary">Mindestgehalt</label>
                <input id="min_salary" type="number" name="min_salary">
            </div>

            <div>
                <label for="max_salary">Höchstgehalt</label>
                <input id="max_salary" type="number" name="max_salary">
            </div>

            <div>
                <label for="location">Ort</label>
                <input id="location" type="text" name="location">
            </div>

            <div>
                <label for="contact_name">Ansprechpartner</label>
                <input id="contact_name" type="text" name="contact_name">
            </div>

            <div>
                <label for="contact_phone">Telefon</label>
                <input id="contact_phone" type="text" name="contact_phone" placeholder="Vorwahl/Telefonummer">
            </div>

            <div>
                <label for="tags">Tags</label>
                <input id="tags" type="text" name="tags" placeholder="tag1, tag2, ...">
            </div>

            <div>
                <span>Aktiv</span>
                <div>
                    <label>
                        <input type="radio" name="is_active" value="1" checked>
                        aktiv
                    </label>
                </div>
                <div>
                    <label>
                        <input type="radio" name="is_active" value="0">
                        inaktiv
                    </label>
                </div>
            </div>

            <div>
                <label for="expires_at">Ablaufdatum</label>
                <input id="expires_at" type="date" name="expires_at">
            </div>

            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route('jobs.index') }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>