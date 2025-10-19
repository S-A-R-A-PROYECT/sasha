<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Reporte Generacion estudiantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <div class="px-2 py-8 mx-auto">
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center">
                <div class="text-gray-700 font-semibold text-lg">
                    <img src="{{public_path('imgs/SASHA.png')}}" class="w-32" alt="">
                </div>
            </div>
            <div class="text-gray-700">
                <div class="font-bold text-xl mb-2 uppercase text-red-500">¡CONFIDENCIAL!</div>
                <div class="text-sm">Recuerde que este archivo es 100% confidencial</div>
                <div class="text-sm">y no deberia ser visto desde por ningun estudiante ya que contiene datos sensibles
                </div>
            </div>
        </div>
        <table class="w-full text-left mb-8 table table-auto border-collapse border border-gray-300">
            <thead>
                <tr>
                    <td class="text-gray-700 font-bold uppercase py-2 px-1 border">Nombre</th>
                    <th class="text-gray-700 font-bold uppercase py-2 px-1 border">Apellido</th>
                    <th class="text-gray-700 font-bold uppercase py-2 px-1 border">Curso</th>
                    <th class="text-gray-700 font-bold uppercase py-2 px-1 border">Documento</th>
                    <th class="text-gray-700 font-bold uppercase py-2 px-1 border">Correo</th>
                    <th class="text-gray-700 font-bold uppercase py-2 px-1 border">Contraseña</th>
                </tr>
            </thead>
            <tbody class="p-5">
                @foreach ($credentials as $item)

                <tr>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["name"]}}</td>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["last_name"]}}</td>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["grade"]}}</td>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["document"]}}</td>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["email"]}}</td>
                    <td class="py-4 px-2 text-gray-700 border">{{$item["password"]}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <footer class="bg-rose-900 text-center py-5 text-white px-2">
        © 2025 SASHA - Todos los derechos reservados.
    </footer>
</body>

</html>