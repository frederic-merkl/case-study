<!DOCTYPE html>
<html lang="de">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Benutzer</title>
	<link rel="stylesheet" href="{{ asset("resources/css/users.css") }}">
</head>

<body>
	<header>
		<h1>Benutzer</h1>
		<p>
			<a href="{{ route('users.create') }}">Neuen Benutzer erstellen</a>
		</p>
	</header>

	@if ($users->isEmpty())
		<p>Es wurden keine Benutzer gefunden.</p>
	@else
		<ul>
			@foreach ($users as $user)
				<li>
					<div>
						ID: {{ $user->id }}
					</div>
					<div>
						Name: <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
					</div>
					<div>
						E-Mail: {{ $user->email }}
					</div>
					<div>
						Erstellt: {{ $user->created_at }}
					</div>
					<div>
						Aktualisiert: {{ $user->updated_at }}
					</div>
					<div>
						<a href="{{ route('users.edit', $user) }}">Bearbeiten</a>
					</div>
				</li>
			@endforeach
		</ul>
	@endif

	<footer>
		<hr>
		<a href="{{ route('jobs.index') }}">Stellenangebote</a>
		<br>
		<a href="{{ route(name: 'companies.index') }}">Firmen</a>
		<br>
		<a href="{{ route('categories.index') }}">Kategorien</a>
	</footer>
</body>

</html>