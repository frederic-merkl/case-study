<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Kategorie bearbeiten: {{ $category->name }}</title>
</head>

<body>
	<div>
		<form action="{{ route('categories.update', $category) }}" method="POST">
			@csrf
			@method("PUT")

			<h2>Kategorie bearbeiten</h2>

			<div>
				<label for="name">Name</label>
				<input id="name" type="text" name="name" value="{{ $category->name }}" required>
			</div>

			<div>
				<button type="submit">Speichern</button>
				<a href="{{ route('categories.index') }}">Abbrechen</a>
			</div>
		</form>
	</div>
</body>

</html>
