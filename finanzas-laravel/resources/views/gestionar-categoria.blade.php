<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Categoria</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Estilos personalizados para ajustar los colores y la tipografía */
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0f2f5;
            /* Un gris muy claro para el fondo */
        }

        .header-blue {
            background-color: #1F41AF;
            /* Azul oscuro para el encabezado principal */
        }

        .button-primary-blue {
            background-color: #1F41AF;
            /* Azul vibrante para botones principales */
            color: white;
        }

        .button-primary-blue:hover {
            background-color: rgb(40, 88, 243);
            /* Tono más oscuro al pasar el ratón */
        }

        .button-modify-green {
            background-color: #28a745;
            /* Verde para el botón modificar */
            color: white;
        }

        .button-modify-green:hover {
            background-color: #218838;
            /* Tono más oscuro al pasar el ratón */
        }

        .search-input {
            border-color: #d1d5db;
            /* Gris claro para el borde del input */
        }

        .table-header-blue {
            background-color: #e6f2ff;
            /* Azul muy claro para los encabezados de tabla */
            color: #1F41AF;
            /* Azul oscuro para el texto del encabezado de tabla */
        }

        /* Estilo para el icono de búsqueda dentro del input */
        .search-container {
            position: relative;
        }

        .search-container input {
            padding-left: 2.5rem;
            /* Espacio para el icono */
        }

        .search-container svg {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            /* Gris para el icono */
        }
    </style>
</head>

<body class="antialiased">
    <div class="min-h-screen bg-gray-100 flex flex-col items-center">
        <!-- Encabezado principal (Gestionar Aulas) -->
        <header class="w-full header-blue py-6 px-6 shadow-md relative flex items-center justify-center">
            <!-- Ícono de casita al lado izquierdo -->
            <a href="{{ route('panel.principal') }}" class="absolute left-6 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300">
                <!-- SVG de ícono de casa -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l9-9 9 9M4 10v10a1 1 0 001 1h5m4 0h5a1 1 0 001-1V10" />
                </svg>

            </a>
            <!-- Título centrado -->
            <h1 class="text-white text-3xl font-bold">Gestionar Categorias</h1>
        </header>

        <!-- Contenedor principal de la aplicación -->
        <div class="w-full max-w-4xl mx-auto mt-8 bg-white rounded-lg shadow-lg overflow-hidden">
            <!-- Barra de búsqueda y botón "Nuevo" -->
            <div class="flex flex-col md:flex-row items-center justify-between p-6">
                <!-- Barra de búsqueda -->
                <div class="search-container w-full md:w-2/3 mb-4 md:mb-0 md:mr-4">
                    <input
                        type="text"
                        placeholder="Buscar"
                        class="w-full py-2 px-4 rounded-lg border search-input focus:outline-none focus:ring-2 focus:ring-blue-300">
                    <!-- Icono de búsqueda -->
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <!-- Botón "Nuevo" -->
                <a
                    class="button-primary-blue flex items-center px-6 py-2 rounded-lg font-semibold shadow-md
                           hover:bg-blue-100 transition duration-200 ease-in-out focus:outline-none focus:ring-2 focus:ring-blue-300"
                    href="{{route('categoria.create')}}">
                    <span class="mr-2">+</span> Nuevo
                </a>
            </div>

            @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4 shadow-sm text-center font-medium">
                {{ session('success') }}
            </div>
            @endif

            <!-- Tabla de datos -->
            <div class="p-6 pt-0">
                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="table-header-blue">
                            <tr>
                                <th scope="col" class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider rounded-tl-lg">
                                    Id
                                </th>
                                <th scope="col" class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">
                                    Nombre
                                </th>
                                <th scope="col" class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider">
                                    Tipo
                                </th>
                                <th scope="col" class="py-3 px-4 text-left text-xs font-semibold uppercase tracking-wider rounded-tr-lg">
                                    Acción
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <!-- Fila de ejemplo 1 -->
                            @foreach($categorias as $categoria)
                            <tr class="hover:bg-blue-50 transition duration-150">
                                <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-800">{{$categoria->id}}</td>
                                <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-600">{{$categoria->nombre}}</td>
                                <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-600">{{$categoria->tipo}}</td>
                                <td class="py-3 px-4 whitespace-nowrap text-sm text-gray-800">
                                    <a class="button-modify-green px-4 py-2 rounded-md font-medium text-xs shadow-sm
                                                   hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300"
                                        href="{{route('categoria.edit',$categoria->id)}}">
                                        Modificar
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>