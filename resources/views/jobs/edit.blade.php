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
            <!-- Title -->
            <div>
                <label for="title">Titel</label>
                <input id="title" type="text" name="title" value="{{ $job->title }}" required>
            </div>
            <!-- Status -->
            <div>
                <label>
                    <input type="radio" name="is_active" value="1" @checked($job->is_active === true)>
                    aktiv
                </label>
            </div>
            <div>
                <label>
                    <input type="radio" name="is_active" value="0" @checked($job->is_active === false)>
                    inaktiv
                </label>
            </div>
            <!-- min. salary -->
            <div>
                <label for="min_salary">Mindestgehalt</label>
                <input id="min_salary" type="number" name="min_salary" value="{{ $job->min_salary }}">
            </div>
            <!-- max. salary -->
            <div>
                <label for="max_salary">Höchstgehalt</label>
                <input id="max_salary" type="number" name="max_salary" value="{{ $job->max_salary }}">
            </div>
            <!-- location -->
            <div>
                <label for="location">Ort</label>
                <input id="location" type="text" name="location" value="{{ $job->location }}">
            </div>
            <!-- company -->
            <div>
                <label for="company_id">Unternehmen</label>
                <select id="company_id" name="company_id" required>
                    @foreach ($companies as $company)
                        <option value="{{ $company->id }}" @selected($company->id === $currentCompany)>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <!-- category -->
            <div>
                <label for="category_id">Kategorie</label>
                <select id="category_id" name="category_ids[]" required multiple>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @selected(in_array($category->id, $currentCategoryIds))>
                            {{$category->name}}
                        </option>
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="tags">Tags</label>
                <input id="tags" type="text" name="tags" value="{{ $job->tags}}">
            </div>
            <!-- contact name -->
            <div>
                <label for="contact_name">Ansprechpartner</label>
                <input id="contact_name" type="name" name="contact_name" value="{{ $job->contact_name }}">
            </div>
            <!-- contact email -->
            <div>
                <label for="contact_email">E-Mail</label>
                <input id="contact_email" type="email" name="contact_email" value="{{ $job->contact_email }}" required>
            </div>
            <!-- contact phone -->
            <div>
                <label for="contact_phone">Phone</label>
                <input id="contact_email" type="tel" name="contact_phone" value="{{ $job->contact_phone }}">
            </div>
            <!-- contact website -->
            <div>
                <label for="website">Website</label>
                <input id="website" type="text" name="website" value="{{ $job->website }}">
            </div>
            <!-- description -->
            <div>
                <label for="description">Beschreibung</label>
                <textarea id="description" name="description" rows="5" required>{{ $job->description }}</textarea>
            </div>
            <div>
                <label for="expires_at">Ablaufdatum</label>
                <!-- TODO find the bug, value is not shown -->
                <!-- TODO find the bug, value is not shown -->
                <!-- TODO find the bug, value is not shown -->
                <input type="date" id="expires_at" name="expires_at" value="{{ $job->expires_at }}">
            </div>

            <!-- submit -->
            <div>
                <button type="submit">Speichern</button>
                <a href="{{ route("jobs.show", $job) }}">Abbrechen</a>
            </div>
        </form>
    </div>
</body>

</html>