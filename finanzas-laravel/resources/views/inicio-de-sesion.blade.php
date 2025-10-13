<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8;
            /* Un color de fondo suave para que coincida con la imagen */
        }
    </style>
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-blue-100">
    <!-- Encabezado con el logo "Nova Aula" -->
    <header class="w-full bg-blue-800 py-4 shadow-md">
        <div class="container mx-auto flex items-center justify-center">
            <h1 class="text-white text-2xl font-bold flex items-center">
                Inicio de Sesión
            </h1>
        </div>
    </header>

    <!-- Contenedor principal del formulario de inicio de sesión -->
    <main class="flex flex-grow items-center justify-center w-full">

        <div class="flex flex-col items-center w-full max-w-sm">
            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 shadow-sm text-center font-medium w-full border">
                {{ session('success') }}
            </div>
            @endif
            @if ($errors->has('login'))
                <p style="color: red;">{{ $errors->first('login') }}</p>
            @endif


            <div class="bg-white p-8 rounded-xl shadow-lg w-full border border-blue-300">
                <form action="{{route('login.procesar')}}" method="post">
                    @csrf
                    <!-- Campo "Usuario" -->
                    <div class="mb-4">
                        <label for="usuario" class="block text-gray-700 text-sm font-medium mb-2">Usuario</label>
                        <input
                            type="text"
                            id="usuario"
                            name="usuario"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                            placeholder="Usuario" />
                    </div>

                    <!-- Campo "Password" -->
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Contraseña</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                            placeholder="Contraseña" />
                    </div>



                    <!-- Botón de "Ingresar" -->
                    <div class="flex items-center justify-center">
                        <button
                            type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full transition duration-200 ease-in-out transform hover:scale-105">
                            Ingresar
                        </button>
                    </div>

                    <!-- Enlace "Regístrate" -->
                    <div class="text-center">
                        <a href="{{route('usuario.create')}}" class="inline-block align-baseline font-bold text-sm text-blue-600 hover:text-blue-800 transition duration-200 ease-in-out mt-4">
                            Regístrate
                        </a>
                    </div>
                </form>
            </div>
        </div>


    </main>
</body>

</html>