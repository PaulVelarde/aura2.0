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
                                {{-- <a href="{{ route('news.show', $ultimaNoticia->idnoticias) }}" class="btn-get-started">Leer
                                    más</a> aqui va el link de la noticia --}}
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
        <section id="recent-posts" class="recent-posts section">

            <section id="recent-posts" class="recent-posts section">
                <!-- Section Title -->
                <div class="container section-title" data-aos="fade-up">
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
                                            <option value="{{ $tipo->idtipo }}"
                                                {{ $type == $tipo->idtipo ? 'selected' : '' }}>
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
            <section id="why-us" class="why-us section">
                <div class="container">
                    <div class="row g-0">
                        <!-- Columna del Video -->
                        <div class="col-xl-5 img-bg" data-aos="fade-up" data-aos-delay="100">
                            <img src="assets/img/why-us-bg.jpg" alt="">
                        </div>
                        <!-- Columna de Noticias -->
                        <div class="col-xl-7 slides position-relative" data-aos="fade-up" data-aos-delay="200">

                            <div class="swiper init-swiper">
                                <script type="application/json" class="swiper-config">
                    {
                        "loop": true,
                        "speed": 600,
                        "autoplay": {
                            "delay": 5000
                        },
                        "slidesPerView": "auto",
                        "centeredSlides": true,
                        "pagination": {
                            "el": ".swiper-pagination",
                            "type": "bullets",
                            "clickable": true
                        },
                        "navigation": {
                            "nextEl": ".swiper-button-next",
                            "prevEl": ".swiper-button-prev"
                        }
                    }
                    </script>
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <iframe width="100%" height="315"
                                                src="https://www.youtube.com/embed/X_d8gwqNJ0o?si=Zvz-hfqya0uoiXMB"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    </div><!-- End slide item -->
                                    <div class="swiper-slide">
                                        <div class="item">
                                            <h3 class="mb-3">Otra Noticia Relevante</h3>
                                            <iframe width="100%" height="315"
                                                src="https://www.youtube.com/embed/X_d8gwqNJ0o?si=Zvz-hfqya0uoiXMB"
                                                title="YouTube video player" frameborder="0"
                                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                                        </div>
                                    </div><!-- End slide item -->
                                </div>
                                <div class="swiper-pagination"></div>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- <-- /Why Us Section --> --}}


            <!-- Features Section -->
            <section id="features" class="features section py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                            <h3 class="mb-3">Videos Destacados</h3>
                            <h4 class="mb-4">Desde TikTok o YouTube</h4>

                            <!-- Cards for Videos -->
                            <div class="row gy-4">
                                <iframe
                                    src="https://www.facebook.com/plugins/video.php?height=476&href=https%3A%2F%2Fwww.facebook.com%2FAuraBoliviaCoomunicacion%2Fvideos%2F1202187177548002%2F&show_text=false&width=336&t=0"
                                    width="100%" height="476" style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowfullscreen="true"
                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                    allowFullScreen="true">
                                </iframe>
                            </div>
                        </div>

                        <div class="col-lg-5 position-relative" data-aos="zoom-out" data-aos-delay="200">
                            <div class="phone-wrap">
                                <img src="assets/img/iphone.png" alt="Phone image" class="img-fluid">
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- /Features Section -->



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
