<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Login</title>
</head>

<body>
    <div>
        <form action="/loginAuthenticator" method="POST" class="bg-green-700 p-6 flex flex-col">
            @csrf
            <h1>Bienvenido proporcione sus credenciales</h1>
            <input type="text" placeholder="username" name="username" id="username">
            <input type="password" placeholder="password" id="password" name="password">
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>

</html>
