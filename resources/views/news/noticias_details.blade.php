@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')

<main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" data-aos="fade"
        style="background-image: url(assets/img/noticias/banner.png); background-size: cover; background-position: center;">
        <div class="container">
            <h1>NOTICIAS HOY </h1>
            <nav class="breadcrumbs">
                <ol>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li class="current">Blog Details</li>
                </ol>
            </nav>
        </div>
    </div><!-- End Page Title -->

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-8">
                <!-- Blog Details Section -->
                <section id="blog-details" class="blog-details section">
                    <div class="container">
                        <article class="article">
                            <div class="post-img">
                                <img src="{{ asset('assets/img/noticias/' . $noticia->image) }}" alt=""
                                    class="img-fluid rounded shadow">
                            </div>

                            <h2 class="title text-primary mt-4">{{ $noticia->titular }}</h2>

                            <div class="meta-top mb-3">
                                <ul class="list-inline">
                                    <li class="list-inline-item"><i class="bi bi-person"></i> <a
                                            href="#">{{ $noticia->autor }}</a></li>
                                    <li class="list-inline-item">
                                        <i class="bi bi-clock"></i>
                                        <a href="#">
                                            <time>{{ $noticia->fecha }}</time>
                                        </a>
                                    </li>

                                    <li class="list-inline-item">
                                        <i class="bi bi-chat-dots"></i>
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
                                    </li>
                                </ul>
                            </div><!-- End meta top -->

                            <div class="content mb-4">
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
            <div class="col-lg-4">
                <!-- Sidebar Section -->
                <section class="sidebar-section">
                    <div class="widget">
                        <h3 class="widget-title">Últimas Noticias</h3>
                        <ul class="list-unstyled">
                            @foreach ($recentNews as $news)
                                <li class="widget-item">
                                    <a href="{{ route('noticias.show', $news->idnoticias) }}">
                                        <h5>{{ $news->titular }}</h5>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget mt-4">
                        <h3 class="widget-title">Síguenos</h3>
                        <div class="social-media">
                            <a href="https://twitter.com" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-twitter"></i> Twitter
                            </a>
                            <a href="https://facebook.com" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-facebook"></i> Facebook
                            </a>
                            <a href="https://instagram.com" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-instagram"></i> Instagram
                            </a>
                            <a href="https://linkedin.com" target="_blank" class="btn btn-outline-primary btn-sm">
                                <i class="bi bi-linkedin"></i> LinkedIn
                            </a>
                        </div>
                    </div>
                </section><!-- /Sidebar Section -->
            </div>
        </div>
    </div>

</main>

@endsection

@push('styles')
    <style>
        .social-share a {
            margin: 0 10px;
            color: #0e3271;
            font-size: 1.2rem;
            transition: color 0.3s ease;
        }

        .social-share a:hover {
            color: #21b4e1;
        }

        .content {
            line-height: 1.6;
            font-size: 1.1rem;
            color: #333;
        }

        .meta-top ul {
            padding-left: 0;
        }

        .meta-top ul li {
            display: inline-block;
            margin-right: 15px;
            font-size: 1rem;
            color: #555;
        }

        .meta-bottom {
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }

        .meta-bottom i {
            font-size: 1.2rem;
            color: #0e3271;
        }

        .widget {
            padding: 15px;
            background-color: #f9f9f9;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .widget-title {
            font-size: 1.3rem;
            color: #0e3271;
            margin-bottom: 10px;
        }

        .widget-item h5 {
            font-size: 1.1rem;
            color: #333;
        }

        .widget-item a {
            color: #333;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .widget-item a:hover {
            color: #21b4e1;
        }

        .sidebar-section {
            padding-left: 20px;
            padding-right: 20px;
        }

        .social-media a {
            display: block;
            margin-bottom: 10px;
            font-size: 1.1rem;
            color: #0e3271;
        }

        .social-media a:hover {
            color: #21b4e1;
        }
    </style>
@endpush
