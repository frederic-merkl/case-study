<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unternehmen bearbeiten: {{ $company->name }}</title>
</head>

<body>
    <div>
        <form action="{{ route("companies.update", $company) }}" method="POST">
            @csrf
            @method("PUT")

            <h2>Unternehmen bearbeiten</h2>

            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ $company->name }}" required>
            </div>

            <div>
                <label for="description">Beschreibung</label>
                <textarea id="description" name="description" rows="5" required>{{ $company->description }}</textarea>
            </div>

            <div>
                <label for="email">E-Mail</label>
                <input id="email" type="email" name="email" value="{{ $company->email }}" required>
            </div>

            <div>
                <label for="city">Stadt</label>
                <input id="city" type="text" name="city" value="{{ $company->city }}" required>
            </div>

            <div>
                <label for="street">Straße</label>
                <input id="street" type="text" name="street" value="{{ $company->street }}">
            </div>

            <div>
                <label for="zip_code">PLZ</label>
                <input id="zip_code" type="text" name="zip_code" value="{{ $company->zip_code }}">
            </div>

            <div>
                <label for="country">Land</label>
                <input id="country" type="text" name="country" value="{{ $company->country }}">
            </div>

            <div>
                <label for="website">Website</label>
                <input id="website" type="text" name="website" value="{{ $company->website }}">
            </div>

            <div>
                <label for="phone">Telefon</label>
                <input id="phone" type="text" name="phone" value="{{ $company->phone }}">
            </div>

            <div>
                <label for="employee_size">Mitarbeiterzahl</label>
                <select id="employee_size" name="employee_size">
                    <option value="">Größe auswählen</option>
                    <option value="<10" {{ $company->employee_size == '<10' ? "selected" : "" }}><10</option>
                    <option value="10-50" {{ $company->employee_size == '10-50' ? "selected" : "" }}>10-50</option>
                    <option value=">50" {{ $company->employee_size == '>50' ? "selected" : "" }}>>50</option>
                    <option value="50-100" {{ $company->employee_size == '50-100' ? "selected" : "" }}>50-100</option>
                    <option value=">100" {{ $company->employee_size == '>100' ? "selected" : "" }}>>100</option>
                    <option value=">500" {{ $company->employee_size == '>500' ? "selected" : "" }}>>500</option>
                </select>
            </div>

            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route("companies.show", $company) }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>