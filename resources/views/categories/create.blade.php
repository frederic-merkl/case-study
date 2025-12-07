<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Neue Kategorie anlegen</title>
</head>

<body>
	<div>
		<form action="{{ route('categories.store') }}" method="POST">
			@csrf
			<h2>Neue Kategorie anlegen</h2>

			<div>
				<label for="name">Name</label>
				<input id="name" type="text" name="name" required>
			</div>

			<div>
				<button type="submit">Speichern</button>
				<a href="{{ route('categories.index') }}">Abbrechen</a>
			</div>
		</form>
	</div>
</body>

</html>