<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Neuen Benutzer anlegen</title>
	<link rel="stylesheet" href="{{ asset("resources/css/users.css") }}">
</head>

<body>
	<div>
		<form action="{{ route('users.store') }}" method="POST">
			@csrf
			@if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

			<h2>Neuen Benutzer anlegen</h2>

			<div>
				<label for="name">Name</label>
				<input id="name" type="text" name="name" required>
			</div>

			<div>
				<label for="email">E-Mail</label>
				<input id="email" type="email" name="email" required>
			</div>

			<div>
				<label for="password">Passwort</label>
				<input id="password" type="password" name="password" required>
			</div>

			<div>
				<label for="password_confirmation">Passwort bestätigen</label>
				<input id="password_confirmation" type="password" name="password_confirmation" required>
			</div>

			<div>
				<button type="submit">Speichern</button>
				<a href="{{ route('users.index') }}">Abbrechen</a>
			</div>
		</form>
	</div>
</body>

</html>
