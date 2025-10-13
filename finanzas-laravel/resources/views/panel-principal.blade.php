<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Principal</title>
    <!-- Incluye el CDN de Tailwind CSS para usar sus utilidades -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Configuración de la fuente Inter para todo el cuerpo */
        body {
            font-family: 'Inter', sans-serif;
        }

        .header-blue {
            background-color: #1F41AF;
            /* Azul oscuro para el encabezado principal */
        }
    </style>
</head>

<body class="flex flex-col min-h-screen bg-gray-100 pb-5">
    <!-- Encabezado del panel de administración -->
    <header class="w-full header-blue py-6 px-6 shadow-md">
        <div class="flex items-center justify-between">

            <div class="flex items-center gap-6">
                <!-- Botón para cerrar sesión -->
                <form method="POST" action="{{route('logout')}}">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-300 font-semibold">
                        Cerrar sesión
                    </button>
                </form>

                <!-- Información del usuario -->
                <div class="text-white text-sm md:text-base leading-tight">
                    <p><strong>Nombre:</strong> {{ auth()->user()->nombre }}</p>
                    <p><strong>Usuario:</strong> {{ auth()->user()->username }}</p>
                </div>
            </div>


            <h1 class="text-white text-3xl font-bold text-center w-full md:w-auto">
                Panel Principal
            </h1>
            <div class="text-white text-sm md:text-base leading-tight">
                <p><strong>Saldo:</strong> Bs. {{ number_format(auth()->user()->saldo, 2) }}</p>
            </div>
        </div>
    </header>

    <!-- Contenedor principal de los botones de navegación -->
    <!-- main ya no necesita ser flex-grow ni w-full para este propósito -->
    <main class="flex items-center justify-center flex-grow">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-5 w-full max-w-3xl p-5">
            <!-- Tarjeta 1 -->
            <a href="{{ route('registro.index') }}" class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-200">
                <div class="w-full h-28 bg-gray-200 rounded-lg mb-5 bg-cover bg-center bg-no-repeat border border-gray-300"
                    style="background-image: url('https://www.movimientoantorchista.org.mx/uploads/olimpo-imgs-v3/foto/articulo/2019/Septiembre/20190910124805.jpg');"></div>
                <div class="text-xl font-bold text-gray-800 text-center">Gestionar Movimientos</div>
            </a>

            <!-- Tarjeta 2 -->
            <a href="{{ route('categoria.index') }}" class="flex flex-col items-center p-6 bg-white rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-2 transition-all duration-300 border border-gray-200">
                <div class="w-full h-28 bg-gray-200 rounded-lg mb-5 bg-cover bg-center bg-no-repeat border border-gray-300"
                    style="background-image: url('https://imagenes.primicias.ec/files/image_480_270/uploads/2024/05/25/66521ec07b822.jpeg');"></div>
                <div class="text-xl font-bold text-gray-800 text-center">Gestionar Categorias</div>
            </a>
        </div>
    </main>

</body>

</html>