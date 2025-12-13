<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job bearbeiten: {{ $job->title }}</title>
    <link rel="stylesheet" href="{{ asset('css/jobs.css') }}">
</head>

<body>
    <div>
        <form action="{{ route("jobs.update", $job) }}" method="POST">
			@csrf
			@method("PUT")
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif
            
            <h2>Job bearbeiten</h2>

            <div>
                <label for="title">Titel</label>
                <input id="title" type="text" name="title" value="{{ $job->title }}" required>
            </div>

            <div> 
                <label for="company_id">Unternehmen</label>
                <select id="company_id" name="company_id" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" selected>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div> 
                <label for="category_id">Kategorie</label>
                <select id="category_id" name="category_ids[]" required multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                        @selected(in_array($category->id, $currentCategoryIds))>
                        {{$category->name}}</option>
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="contact_email">E-Mail</label>
                <input id="contact_email" type="email" name="contact_email" value="{{ $job->contact_email }}" required>
            </div>

            <div>
                <label for="description">Beschreibung</label>
                <textarea id="description" name="description" rows="5" required>{{ $job->description }}</textarea>
            </div>

            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route("jobs.show", $job) }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>