@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')
    <div class="container my-5">
        <h1 class="text-2xl font-bold mb-6">NOTICIAS</h1>

        <div class="row g-4">
            <!-- Formulario 1: Añadir Noticia -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Añadir Noticia</h2>

                        <form action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Campo Titular -->
                            <div class="mb-3">
                                <label for="titular" class="form-label">Titular:</label>
                                <input type="text" id="titular" name="titular" required class="form-control"
                                    placeholder="Escribe el titular de la noticia">
                            </div>

                            <!-- Campo Contenido -->
                            <div class="mb-3">
                                <label for="contenido" class="form-label">Contenido:</label>
                                <textarea id="contenido" name="contenido" required rows="4" class="form-control"
                                    placeholder="Escribe el contenido de la noticia"></textarea>
                            </div>

                            <!-- Campo Fecha -->
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha:</label>
                                <input type="text" id="fecha" name="fecha" disabled
                                    value="{{ now()->format('Y-m-d H:i:s') }}" class="form-control bg-light text-muted">
                            </div>

                            <!-- Campo Imagen -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Imagen:</label>
                                <input type="file" id="image" name="image" accept="image/*" required
                                    class="form-control" onchange="previewImage(event, 'previewImage1')">
                                <img id="previewImage1" class="mt-2 w-100 h-auto rounded" alt="Vista previa">
                            </div>

                            <!-- Botón de Enviar -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Añadir Noticia</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Formulario 2: Añadir Videos Redes Sociales -->
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title mb-4">Añadir Videos Redes Sociales</h2>

                        <form action="{{ route('admin.store.video') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Campo Título -->
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Título:</label>
                                <input type="text" id="titulo" name="titulo" required class="form-control"
                                    placeholder="Escribe el título del video">
                            </div>

                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha:</label>
                                <input type="text" id="fecha" name="fecha" disabled
                                    value="{{ now()->format('Y-m-d H:i:s') }}" class="form-control bg-light text-muted">
                            </div>

                            <!-- Campo URL -->
                            <div class="mb-3">
                                <label for="URL" class="form-label">URL:</label>
                                <input type="text" id="URL" name="URL" required class="form-control"
                                    placeholder="Escribe la URL del video" onchange="previewURL(event)">
                            </div>

                            <!-- Campo Fuente -->
                            <div class="mb-3">
                                <label for="fuente" class="form-label">Fuente:</label>
                                <select id="fuente" name="fuente" required class="form-select">
                                    <option value="" disabled selected>Selecciona una opción</option>
                                    <option value="facebook">Facebook</option>
                                    <option value="instagram">Instagram</option>
                                    <option value="youtube">YouTube</option>
                                    <option value="tiktok">TikTok</option>
                                    <option value="x">X (Twitter)</option>
                                </select>
                            </div>

                            <!-- Vista Previa de URL -->
                            <div class="mb-3">
                                <label class="form-label">Vista Previa:</label>
                                <iframe id="previewURL" class="w-100 h-auto border rounded"></iframe>
                            </div>

                            <!-- Botón de Enviar -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Añadir Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
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
@endsection
