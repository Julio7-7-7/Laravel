<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Waos</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

  <div class="bg-white p-6 rounded shadow-md w-80">
    <h1 class="text-2xl font-bold mb-4 text-center">Bienvenido al login waos</h1>

    <form action="/login-authenticator" method="POST" class="flex flex-col gap-3">
      @csrf
      <input type="text" name="username" placeholder="Username" class="border p-2 rounded">
      <input type="password" name="password" placeholder="Password" class="border p-2 rounded">
      <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
        Enviar
      </button>
    </form>
  </div>

</body>
