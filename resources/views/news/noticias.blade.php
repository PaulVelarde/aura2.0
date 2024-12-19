@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')

    <main class="main">

        <div class="page-title dark-background"
            style="background-image: url('{{ asset('assets/img/noticias/banner.jpg') }}');">
            <div class="container">
                <h1>Blog</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li class="current">Blog</li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-8">

                    <!-- Blog Posts Section -->
                    <section id="blog-posts" class="blog-posts section">
                        <div class="container">
                            <div class="row gy-4" id="blog-news-container">
                                @forelse ($noticias as $noticia)
                                    <div class="col-lg-6">
                                        <article>
                                            <div class="post-img">
                                                <img src="assets/img/noticias/{{ $noticia->image }}" alt=""
                                                    class="img-fluid">
                                            </div>
                                            <p class="post-category">
                                                @foreach ($noticia->tipos as $tipo)
                                                    {{ $tipo->nombre }}
                                                @endforeach
                                            </p>
                                            <h2 class="title">
                                                <a href="{{ route('noticias.show', $noticia->idnoticias) }}">
                                                    {{ $noticia->titular }}
                                                </a>
                                            </h2>

                                            <div class="d-flex align-items-center">
                                                <img src="{{ asset('assets/img/blog/blog-author.jpg') }}" alt=""
                                                    class="img-fluid post-author-img flex-shrink-0">
                                                <div class="post-meta">
                                                    <p class="post-author">{{ $noticia->user->nombre }}</p>
                                                    <p class="post-date">
                                                        <time datetime="{{ $noticia->created_at }}">
                                                            {{ $noticia->created_at->format('M d, Y') }}
                                                        </time>
                                                    </p>
                                                </div>
                                            </div>
                                        </article>
                                    </div><!-- End post list item -->
                                @empty
                                    <p>No hay noticias disponibles en este momento.</p>
                                @endforelse
                            </div>
                            <!-- Paginación -->
                            <div class="mt-4">
                                <div class="pagination justify-content-center">
                                    <ul class="pagination">
                                        <li class="page-item {{ $noticias->onFirstPage() ? 'disabled' : '' }}">
                                            <a class="page-link" href="#"
                                                onclick="loadBlogPage('{{ $noticias->previousPageUrl() }}'); return false;"
                                                aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        @for ($i = 1; $i <= $noticias->lastPage(); $i++)
                                            <li class="page-item {{ $i == $noticias->currentPage() ? 'active' : '' }}">
                                                <a class="page-link" href="#"
                                                    onclick="loadBlogPage('{{ $noticias->url($i) }}'); return false;">{{ $i }}</a>
                                            </li>
                                        @endfor
                                        <li class="page-item {{ $noticias->hasMorePages() ? '' : 'disabled' }}">
                                            <a class="page-link" href="#"
                                                onclick="loadBlogPage('{{ $noticias->nextPageUrl() }}'); return false;"
                                                aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </section>


                </div>

                <!-- Sidebar Section -->
                <div class="col-lg-4 sidebar">
                    <div class="widgets-container">

                        <!-- Search Widget -->
                        <div class="search-widget widget-item">
                            <h3 class="widget-title">Search</h3>
                            <form action="{{ route('noticias.index') }}" method="get">
                                <input type="text" name="query" placeholder="Search...">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!--/Search Widget -->

                        <!-- Categories Widget -->
                        <div class="categories-widget widget-item">
                            <h3 class="widget-title">Categories</h3>
                            <ul class="mt-3">
                                @foreach ($tipos as $tipo)
                                    <li><a href="{{ route('noticias.index', ['categoria' => $tipo->nombre]) }}">
                                            {{ $tipo->nombre }}
                                        </a></li>
                                @endforeach
                            </ul>
                        </div><!--/Categories Widget -->

                        <!-- Recent Posts Widget -->
                        <div class="recent-posts-widget widget-item">
                            <h3 class="widget-title">Recent Posts</h3>
                            @foreach ($noticias as $noticia)
                                <div class="post-item">
                                    <img src="assets/img/noticias/{{ $noticia->image }}" alt=""
                                        class="flex-shrink-0">
                                    <div>
                                        <h4><a href="{{ route('noticias.show', $noticia->idnoticias) }}">
                                                {{ $noticia->titular }}
                                            </a></h4>
                                        <time datetime="{{ $noticia->created_at }}">
                                            {{ $noticia->created_at->format('M d, Y') }}
                                        </time>
                                    </div>
                                </div><!-- End recent post item-->
                            @endforeach
                        </div><!--/Recent Posts Widget -->

                    </div>
                </div>

            </div>
        </div>

    </main>


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
