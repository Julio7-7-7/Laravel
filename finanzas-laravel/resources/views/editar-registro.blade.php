<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Registro</title>
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
    <header class="w-full bg-blue-800 py-6 px-6 shadow-md relative flex items-center justify-center">
        <!-- Ícono de casita al lado izquierdo -->
        <a href="{{ route('registro.index') }}" class="absolute left-6 top-1/2 transform -translate-y-1/2 text-white hover:text-gray-300">
            <!-- SVG de ícono de casa -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
            </svg>

        </a>
        <!-- Título centrado -->
        <h1 class="text-white text-3xl font-bold">Editar Registro</h1>
    </header>

    <!-- Contenedor principal del formulario de inicio de sesión -->
    <main class="flex flex-grow items-center justify-center w-full">

        <div class="flex flex-col items-center w-full max-w-sm">

            <div class="bg-white p-8 rounded-xl shadow-lg w-full border border-blue-300">
                <form action="{{route('registro.update',$registro->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <!-- Campo "nombre" -->
                    <div class="mb-4">
                        <label for="descripcion" class="block text-gray-700 text-sm font-medium mb-2">Descripción</label>
                        <input
                            type="text"
                            id="descripcion"
                            name="descripcion"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                            placeholder="Descripción del movimiento"
                            value="{{$registro->descripcion}}" />
                    </div>

                    <div class="mb-4">
                        <label for="fecha" class="block text-gray-700 text-sm font-medium mb-2">Fecha</label>
                        <input
                            type="date"
                            id="fecha"
                            name="fecha"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                            placeholder="" 
                            value="{{ old('fecha', isset($registro->fecha) ? \Carbon\Carbon::parse($registro->fecha)->format('Y-m-d') : now()->format('Y-m-d')) }}" />
                    </div>

                    <div class="mb-4">
                        <label for="monto" class="block text-gray-700 text-sm font-medium mb-2">Monto</label>
                        <input
                            type="number"
                            id="monto"
                            name="monto"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out"
                            placeholder="Monto del movimiento" 
                            value="{{$registro->monto}}" />
                    </div>

                    <div class="mb-8">
                    <label for="categoria" class="block text-gray-700 text-sm font-medium mb-2">
                        Categoria
                    </label>
                    <div class="relative">
                        <select
                            id="categoria"
                            name="categoria"
                            class="shadow-sm appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-blue-600 focus:border-transparent transition duration-200 ease-in-out">
                            <option value="">Seleccione una categoria</option>
                            <option value="{{$registro->categoria->id}}"{{old('categoria', $registro->categoria->id) == $registro->categoria->id ? 'selected' : '' }}>{{$registro->categoria->nombre}} | {{$registro->categoria->tipo}}</option>
                            @foreach($categorias as $categoria)
                                <option value="{{$categoria->id}}">{{$categoria->nombre}} | {{$categoria->tipo}}</option>
                            @endforeach
                            
                        </select>
                        @error('categoria')
                            <p class="text-red-500 text-sm mt-1">{{$$message}}</p>
                        @enderror

                        <!-- Icono de flecha para el select -->
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                    </div>
                </div>



                    <!-- Botón de "Ingresar" -->
                    <div class="flex items-center justify-center">
                        <button
                            type="submit"
                            class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline w-full transition duration-200 ease-in-out transform hover:scale-105">
                            Registrar
                        </button>
                    </div>

                </form>
            </div>
        </div>


    </main>
</body>

</html>