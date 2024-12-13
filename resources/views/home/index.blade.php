@extends('layouts.app')

@section('title', 'Inicio')

@section('content')

    <style>

    </style>
    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section dark-background">
            <img src="assets/img/noticias/{{ $ultimaNoticia->image }}" alt="Background Image" data-aos="fade-in">

            <div class="container">
                <div class="row">
                    <div class="col-xl-4">
                        @if ($ultimaNoticia)
                            <h3 data-aos="fade-up">{{ $ultimaNoticia->titular }}</h3>
                            <blockquote data-aos="fade-up" data-aos-delay="100">
                                <p>{{ Str::limit($ultimaNoticia->contenido, 150, '...') }}</p>
                            </blockquote>
                            <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
                                <a href="{{ route('noticias.show', $ultimaNoticia->idnoticias) }}" class="btn-get-started">
                                    Quiere saber mas...
                                </a>
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8"
                                    class="glightbox btn-watch-video d-flex align-items-center">
                                    <i class="bi bi-play-circle"></i><span>Watch Video</span>
                                </a>
                            </div>
                        @else
                            <h1 data-aos="fade-up">No hay noticias disponibles</h1>
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- /Hero Section -->
        <!-- Recent Posts Section -->
        <section id="recent-posts" class="recent-posts section" style="padding-top: 20px; padding-bottom: 20px;">
            <div class="container section-title" data-aos="fade-up" style="margin-bottom: -15px;">
                <h2>Últimas Noticias</h2>
            </div><!-- End Section Title -->

            <section class="recent-posts">
                <div class="container">
                    <!-- Filtro de Tipos -->


                    <!-- Contenedor de Noticias -->
                    <div class="row gy-5" id="news-container">
                        <!-- Columna de noticias (3/4 del espacio) -->
                        <div class="col-md-9">
                            <div class="mb-4">
                                <label for="news-type" class="form-label">Filtrar por tipo de noticia:</label>
                                <select id="news-type" class="form-select" onchange="filterNews()">
                                    <option value="all" {{ $type === 'all' ? 'selected' : '' }}>Todos</option>
                                    @foreach ($tipos as $tipo)
                                        <option value="{{ $tipo->idtipo }}" {{ $type == $tipo->idtipo ? 'selected' : '' }}>
                                            {{ $tipo->nombre }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @forelse ($ultimasNoticias as $noticia)
                                <div class="col-12 mb-4" data-aos="fade-up" data-aos-delay="200">
                                    <div class="post-box border rounded shadow-sm">
                                        <div class="row no-gutters">
                                            <div class="col-md-3">
                                                <img src="assets/img/noticias/{{ $noticia->image }}"
                                                    class="img-fluid rounded-left" alt="{{ $noticia->titular }}">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="p-3">
                                                    <h3 class="post-title">{{ $noticia->titular }}</h3>
                                                    <p>{{ Str::limit($noticia->contenido, 100) }}</p>
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <a href="{{ route('noticias.show', $noticia->idnoticias) }}"
                                                            class="btn btn-primary">Leer Más</a>

                                                        <!-- Enlaces para compartir en redes sociales -->
                                                        <div class="social-share">
                                                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('noticias.show', $noticia->idnoticias)) }}&text={{ urlencode($noticia->titular) }}"
                                                                target="_blank" title="Compartir en Twitter">
                                                                <i class="bi bi-twitter"></i>
                                                            </a>
                                                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('noticias.show', $noticia->idnoticias)) }}"
                                                                target="_blank" title="Compartir en Facebook">
                                                                <i class="bi bi-facebook"></i>
                                                            </a>
                                                            <a href="https://www.instagram.com/?url={{ urlencode(route('noticias.show', $noticia->idnoticias)) }}"
                                                                target="_blank" title="Compartir en Instagram">
                                                                <i class="bi bi-instagram"></i>
                                                            </a>
                                                            <a href="https://wa.me/?text={{ urlencode(route('noticias.show', $noticia->idnoticias)) }}&amp;app_absent=0"
                                                                target="_blank" title="Compartir en WhatsApp">
                                                                <i class="bi bi-whatsapp"></i>
                                                            </a>
                                                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(route('noticias.show', $noticia->idnoticias)) }}&title={{ urlencode($noticia->titular) }}"
                                                                target="_blank" title="Compartir en LinkedIn">
                                                                <i class="bi bi-linkedin"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @empty
                                <p>No hay noticias disponibles para este filtro.</p>
                            @endforelse
                        </div>

                        <!-- Columna de TikToks (1/4 del espacio) -->
                        <div class="col-md-3">
                            <div class="d-flex flex-column">
                                <h5>Últimos TikToks</h5>
                                <!-- Agregar los TikToks aquí -->

                                @foreach ($tikTokReels as $tiktok)
                                    <div class="video-card shadow-sm rounded mb-4">
                                        {!! $tiktok->url !!}


                                    </div>
                                @endforeach
                            </div>


                        </div>
                    </div>

                    <!-- Paginación -->
                    <div class="mt-4">
                        <div class="pagination justify-content-center">
                            <ul class="pagination">
                                <!-- Botón de anterior -->
                                <li class="page-item {{ $ultimasNoticias->onFirstPage() ? 'disabled' : '' }}">
                                    <a class="page-link" href="#"
                                        onclick="loadPage('{{ $ultimasNoticias->previousPageUrl() }}'); return false;"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <!-- Páginas individuales -->
                                @for ($i = 1; $i <= $ultimasNoticias->lastPage(); $i++)
                                    <li class="page-item {{ $i == $ultimasNoticias->currentPage() ? 'active' : '' }}">
                                        <a class="page-link" href="#"
                                            onclick="loadPage('{{ $ultimasNoticias->url($i) }}'); return false;">{{ $i }}</a>
                                    </li>
                                @endfor

                                <!-- Botón de siguiente -->
                                <li class="page-item {{ $ultimasNoticias->hasMorePages() ? '' : 'disabled' }}">
                                    <a class="page-link" href="#"
                                        onclick="loadPage('{{ $ultimasNoticias->nextPageUrl() }}'); return false;"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </section>


        <!-- Why Us Section -->
        <!-- Why Us Section -->


        {{-- <-- /Why Us Section --> --}}


        <section id="news-carousel" class="news-carousel section">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>Últimas Noticias de Facebook</h2>
                <p>Explora los últimos videos publicados en nuestra página de Facebook.</p>
            </div><!-- End Section Title -->

            <div class="container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper init-swiper">
                    <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            },
                            "navigation": {
                                "nextEl": ".swiper-button-next",
                                "prevEl": ".swiper-button-prev"
                            },
                            "breakpoints": {
                                "320": {
                                    "slidesPerView": 1,
                                    "spaceBetween": 20
                                },
                                "768": {
                                    "slidesPerView": 2,
                                    "spaceBetween": 20
                                },
                                "1200": {
                                    "slidesPerView": 3,
                                    "spaceBetween": 30
                                }
                            }
                        }
                        </script>
                    <div class="swiper-wrapper">
                        @foreach ($facebookLinks as $link)
                            <div class="swiper-slide">
                                <div class="video-item"
                                    style="box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); padding: 15px; border-radius: 10px; background-color: #fff; margin: 10px;">
                                    <div class="video-container">
                                        {!! $link->url !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                    <!-- Navigation Buttons -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>




    </main>

    <script>
        function loadPage(url) {
            const newsContainer = document.getElementById('news-container');

            // Mostrar un cargador mientras se obtiene la nueva página
            newsContainer.innerHTML = "<div class='text-center'>Cargando...</div>";

            // Usar fetch para obtener los datos de la siguiente página
            fetch(url)
                .then(response => response.text())
                .then(data => {
                    // Crear un contenedor temporal para manipular el HTML
                    const tempDiv = document.createElement('div');
                    tempDiv.innerHTML = data;

                    // Extraer el nuevo contenido de noticias
                    const newContent = tempDiv.querySelector('#news-container').innerHTML;

                    // Actualizar el contenedor de noticias con el nuevo contenido
                    newsContainer.innerHTML = newContent;

                    // Actualizar la paginación si es necesario
                    const pagination = tempDiv.querySelector('.pagination').innerHTML;
                    document.querySelector('.pagination').innerHTML = pagination;
                })
                .catch(error => console.error('Error al cargar la página de noticias:', error));
        }
    </script>
    <script>
        // Inicializar el swiper
        const swiper = new Swiper('.init-swiper', JSON.parse(document.querySelector('.swiper-config').textContent));
    </script>
    <script>
        // Seleccionar todos los iframes de videos
        const videos = document.querySelectorAll('iframe');

        // Inicializar el swiper
        const swiper = new Swiper('.init-swiper', JSON.parse(document.querySelector('.swiper-config').textContent));

        // Detener autoplay cuando el video está en reproducción
        videos.forEach(video => {
            video.addEventListener('play', () => {
                swiper.autoplay.stop();
            });

            // Reanudar autoplay cuando se pause el video
            video.addEventListener('pause', () => {
                swiper.autoplay.start();
            });
        });
    </script>
    <script>
        function filterNews() {
            const type = document.getElementById('news-type').value;
            const url = `?type=${type}`;

            fetch(url)
                .then(response => response.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    document.getElementById('news-container').innerHTML =
                        doc.querySelector('#news-container').innerHTML;
                })
                .catch(error => console.error('Error:', error));
        }
        const swiper = new Swiper('.init-swiper', {
            loop: true,
            speed: 600,
            autoplay: {
                delay: 5000
            },
            slidesPerView: "auto",
            centeredSlides: true,
            pagination: {
                el: ".swiper-pagination",
                type: "bullets",
                clickable: true
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev"
            }
        });

        // Función para cambiar el texto dinámicamente
        swiper.on('slideChange', function() {
            const activeSlide = swiper.slides[swiper.activeIndex];
            const textElement = document.querySelector("#noticia1-text, #noticia2-text");

            if (swiper.activeIndex === 1) {
                document.getElementById("noticia1-text").innerText =
                    "Este es el texto actualizado para la última noticia.";
            } else if (swiper.activeIndex === 2) {
                document.getElementById("noticia2-text").innerText =
                    "Este es el texto para otra noticia que cambia dinámicamente.";
            }
        });
    </script>
@endsection
