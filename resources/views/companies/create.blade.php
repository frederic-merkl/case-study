<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Neues Unternehmen anlegen</title>
</head>

<body>
    <div>
        <form action="{{ route('companies.store') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <h2>Neues Unternehmen anlegen</h2>

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" required>
            </div>

            <div>
                <label for="description">Beschreibung</label>
                <textarea id="description" name="description" rows="5" required></textarea>
            </div>

            <div>
                <label for="email">E-Mail</label>
                <input id="email" type="email" name="email" required>
            </div>

            <div>
                <label for="city">Stadt</label>
                <input id="city" type="text" name="city" required>
            </div>

            <div>
                <label for="street">Straße und Hausnummer</label>
                <input id="street" type="text" name="street">
            </div>

            <div>
                <label for="zip_code">PLZ</label>
                <input id="zip_code" type="text" name="zip_code">
            </div>

            <div>
                <label for="country">Land</label>
                <input id="country" type="text" name="country">
            </div>

            <div>
                <label for="website">Website</label>
                <input id="website" type="text" name="website">
            </div>

            <div>
                <label for="phone">Telefon</label>
                <input id="phone" type="text" name="phone">
            </div>

            <div>
                <label for="employee_size">Mitarbeiterzahl</label>
                <select id="employee_size" name="employee_size">
                    <option value="">Größe auswählen</option>
                    <option value="<10">&lt;10</option>
                    <option value="10-50">10-50</option>
                    <option value=">50">>50</option>
                    <option value="50-100">50-100</option>
                    <option value=">100">>100</option>
                    <option value=">500">>500</option>
                </select>
            </div>

            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route('companies.index') }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>