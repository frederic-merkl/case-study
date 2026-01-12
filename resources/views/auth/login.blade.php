<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <form action="{{ route("login.store") }}" method="POST">
            @csrf

            <div>
                <label for="email-input">E-mail</label>
                <input type="email" name="email" id="email-input" required>
            </div>

            <div>
                <label for="password-input">Passwort</label>
                <input type="password" name="password" id="password-input" required>
            </div>

            <button type="submit">Login</button>
        </form>
    </main>
</body>

</html>