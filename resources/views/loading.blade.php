@extends('layouts.app')

@section('title', 'Cargando - Aura Noticias')

<style>
    /* Pantalla de carga */
    .loading-screen {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        width: 100%;
        background: #000;
        /* Fondo negro */
        position: fixed;
        top: 0;
        left: 0;
        z-index: 9999;
        opacity: 1;
        /* Comienza completamente opaco */
        transition: opacity 1s ease-in-out;
        /* Efecto de desvanecimiento */
    }

    .hidden {
        display: none;
    }
</style>

@section('content')
    <div class="loading-screen" id="loading-screen"></div> <!-- Pantalla de carga negra -->
@endsection

@section('scripts')
    <script>
        window.addEventListener('load', () => {
            const loadingScreen = document.getElementById('loading-screen');

            setTimeout(() => {
                // Desvanece la pantalla de carga
                loadingScreen.style.opacity = '0';

                setTimeout(() => {
                    // Elimina la pantalla de carga después del desvanecimiento
                    window.location.href = "{{ route('home') }}"; // Redirige a la página principal
                }, 1000); // Ajustar el tiempo de transición (1s en este caso)
            }, 2000); // Tiempo antes de que inicie el desvanecimiento
        });
    </script>
@endsection
