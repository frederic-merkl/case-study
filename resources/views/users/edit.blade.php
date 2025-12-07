<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Benutzer bearbeiten: {{ $user->name }}</title>
	<link rel="stylesheet" href="{{ asset("resources/css/users.css") }}">
</head>

<body>
	<div>
		<form action="{{ route('users.update', $user) }}" method="POST">
			@csrf
			@method('PUT')

			<h2>Benutzer bearbeiten</h2>

			<div>
				<label for="name">Name</label>
				<input id="name" type="text" name="name" value="{{ $user->name }}" required>
			</div>

			<div>
				<label for="email">E-Mail</label>
				<input id="email" type="email" name="email" value="{{ $user->email }}" required>
			</div>

			<div>
				<button type="submit">Speichern</button>
				<a href="{{ route('users.show', $user) }}">Abbrechen</a>
			</div>
		</form>
	</div>
</body>

</html>
