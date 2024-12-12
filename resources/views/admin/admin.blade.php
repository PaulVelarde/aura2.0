@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')

    <!-- Banner Principal con Noticias Destacadas -->


    <!-- Sección de Noticias Destacadas -->

    <body>
        <h1 style="color: black">NOTICIAS</h1>
        <br>
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Formulario 1: Añadir Noticia -->
            <form action="" method="POST" enctype="multipart/form-data" class="p-6 bg-white shadow-md rounded-lg">
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Añadir Noticia</h2>

                <!-- Campo Titular -->
                <div class="mb-4">
                    <label for="titular" class="block text-sm font-medium text-gray-700 mb-2">Titular:</label>
                    <input type="text" id="titular" name="titular" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Escribe el titular de la noticia">
                </div>

                <!-- Campo Contenido -->
                <div class="mb-4">
                    <label for="contenido" class="block text-sm font-medium text-gray-700 mb-2">Contenido:</label>
                    <textarea id="contenido" name="contenido" required rows="4"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Escribe el contenido de la noticia"></textarea>
                </div>

                <!-- Campo Fecha -->
                <div class="mb-4">
                    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-2">Fecha:</label>
                    <input type="text" id="fecha" name="fecha" disabled value="{{ now()->format('Y-m-d H:i:s') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none bg-gray-100 text-gray-600">
                </div>

                <!-- Campo Imagen -->
                <div class="mb-4">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Imagen:</label>
                    <input type="file" id="image" name="image" accept="image/*" required
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                        onchange="previewImage(event, 'previewImage1')">
                    <img id="previewImage1" class="mt-4 w-full h-40 object-cover rounded-md" alt="Vista previa">
                </div>

                <!-- Botón de Enviar -->
                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Añadir Noticia
                    </button>
                </div>
            </form>

            <!-- Formulario 2: Añadir Videos Redes Sociales -->
            <form action="" method="POST" enctype="multipart/form-data" class="p-6 bg-white shadow-md rounded-lg">
                @csrf
                <h2 class="text-2xl font-bold mb-6 text-gray-800">Añadir Videos Redes Sociales</h2>

                <!-- Campo Título -->
                <div class="mb-4">
                    <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">Título:</label>
                    <input type="text" id="titulo" name="titulo" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Escribe el título del video">
                </div>

                <div class="mb-4">
                    <label for="fecha" class="block text-sm font-medium text-gray-700 mb-2">Fecha:</label>
                    <input type="text" id="fecha" name="fecha" disabled value="{{ now()->format('Y-m-d H:i:s') }}"
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none bg-gray-100 text-gray-600">
                </div>

                <!-- Campo URL -->
                <div class="mb-4">
                    <label for="URL" class="block text-sm font-medium text-gray-700 mb-2">URL:</label>
                    <input type="text" id="URL" name="URL" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Escribe la URL del video" onchange="previewURL(event)">
                </div>

                <!-- Campo Fuente -->
                <div class="mb-4">
                    <label for="fuente" class="block text-sm font-medium text-gray-700 mb-2">Fuente:</label>
                    <select id="fuente" name="fuente" required
                        class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="" disabled selected>Selecciona una opción</option>
                        <option value="facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="youtube">YouTube</option>
                        <option value="tiktok">TikTok</option>
                        <option value="x">X (Twitter)</option>
                    </select>
                </div>

                <!-- Vista Previa de URL -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Vista Previa:</label>
                    <iframe id="previewURL" class="w-full h-40 border rounded-md"></iframe>
                </div>


                <!-- Botón de Enviar -->
                <div class="text-right">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        Añadir Video
                    </button>
                </div>
            </form>
        </div>

        <script>
            // Vista previa de la imagen
            function previewImage(event, previewId) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById(previewId).src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }

            // Vista previa de la URL
            function previewURL(event) {
                const iframe = document.getElementById('previewURL');
                iframe.src = event.target.value;
            }
        </script>


        <!-- Sección Multimedia -->
        <div class="bg-gray-100 py-12">
            <div class="container mx-auto px-6">
                <h2 class="text-2xl font-semibold text-gray-800 mb-6">Multimedia</h2>
                <div class="bg-white rounded-lg shadow-md overflow-hidden">


                </div>
            </div>
        </div>

    @endsection

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const buttons = document.querySelectorAll('.pagination-btn');
            const pages = document.querySelectorAll('.noticia-pagina');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    const pageIndex = button.getAttribute('data-page');

                    // Ocultar todas las páginas
                    pages.forEach(page => page.classList.add('hidden'));

                    // Mostrar la página seleccionada
                    pages[pageIndex].classList.remove('hidden');

                    // Actualizar estilos de los botones
                    buttons.forEach(btn => btn.classList.remove('btn-primary'));
                    button.classList.add('btn-primary');
                });
            });
        });
    </script>

</body>

</html>
