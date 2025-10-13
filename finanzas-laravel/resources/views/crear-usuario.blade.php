<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
    <!-- Incluye Tailwind CSS desde CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f4f8; /* Un color de fondo suave para que coincida con la imagen */
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-blue-100">
    <!-- Encabezado "Registrarse" -->
    <header class="w-full bg-blue-800 py-4 shadow-md">
        <div class="container mx-auto flex items-center justify-center">
            <h1 class="text-white text-2xl font-bold flex items-center">
                Registrarse
            </h1>
        </div>
    </header>

    <!-- Contenedor principal del formulario de inicio de sesión -->
    <main class="flex flex-grow items-center justify-center w-full">
        <div class="bg-white p-8 rounded-xl shadow-lg w-full max-w-sm border border-blue-300">
            <form action="{{route('usuario.store')}}" method="post">
                @csrf
                <!-- Campo "Nombre" -->
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 text-sm font-medium mb-2">Nombre</label>
                    <input
                        type="text"
                        id="nombre"
                        name="nombre"
                        class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                        placeholder="Introduzca su nombre"
                    />
                </div>

                <!-- Campo "Usuario" -->
                <div class="mb-4">
                    <label for="usuario" class="block text-gray-700 text-sm font-medium mb-2">Usuario</label>
                    <input
                        type="text"
                        id="usuario"
                        name="usuario"
                        class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                        placeholder="Introduzca su usuario"
                    />
                </div>

                <!-- Campo "Contraseña" -->
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 text-sm font-medium mb-2">Contraseña</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                        placeholder="Introduzca su contraseña"
                    />
                </div>
                
                <!-- Botón de "Registrar" -->
                <div class="flex items-center justify-center">
                    <button
                        type="submit"
                        class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full transition duration-200 ease-in-out transform hover:scale-105"
                    >
                        Registrar
                    </button>
                </div>

            </form>
        </div>
    </main>
</body>
</html>
