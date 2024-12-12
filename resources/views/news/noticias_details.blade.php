@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url(assets/img/blog-page-title-bg.jpg);">
            <div class="container">
                <h1>Blog Details</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li class="current">Blog Details</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Blog Details Section -->
                    <section id="blog-details" class="blog-details section">
                        <div class="container">
                            <article class="article">
                                <div class="post-img">
                                    <img src="{{ asset('assets/img/noticias/' . $noticia->image) }}" alt=""
                                        class="img-fluid">
                                </div>

                                <h2 class="title">{{ $noticia->titular }}</h2>

                                <div class="meta-top">
                                    <ul>
                                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                                href="#">{{ $noticia->autor }}</a></li>
                                        <li class="d-flex align-items-center">
                                            <i class="bi bi-clock"></i>
                                            <a href="#">
                                                <time>
                                                    {{ $noticia->fecha }}
                                                </time>
                                            </a>
                                        </li>

                                        <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a <div
                                                class="social-share">
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
                                </a></li>
                                </ul>
                        </div><!-- End meta top -->

                        <div class="content">
                            {!! $noticia->contenido !!}
                        </div><!-- End post content -->

                        <div class="meta-bottom">
                            <i class="bi bi-folder"></i>
                            <ul class="cats">
                                <li><a href="#">Business</a></li>
                            </ul>

                            <i class="bi bi-tags"></i>
                            <ul class="tags">
                                <li><a href="#">Creative</a></li>
                                <li><a href="#">Tips</a></li>
                                <li><a href="#">Marketing</a></li>
                            </ul>
                        </div><!-- End meta bottom -->

                        </article>

                </div>
                </section><!-- /Blog Details Section -->

            </div>
        </div>
        </div>

    </main>




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
