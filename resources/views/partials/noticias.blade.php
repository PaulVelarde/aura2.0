{{-- partials/noticias.blade.php --}}
<div class="row gy-5" id="news-container">
    @foreach ($ultimasNoticias as $item)
        <div class="col-xl-6 col-md-4" data-aos="fade-up" data-aos-delay="200">
            <div class="post-box border rounded shadow-sm">
                <div class="post-img">
                    <img src="assets/img/noticias/{{ $item->image }}" class="img-fluid rounded-top" alt="">
                </div>
                <div class="p-3">
                    <div class="meta mb-2">
                        <span class="post-date text-muted">{{ $item->created_at->format('D, F j') }}</span>
                        <span class="post-author text-muted"> / {{ $item->autor }}</span>
                    </div>
                    <h3 class="post-title">{{ $item->titular }}</h3>
                    <p>{{ Str::limit($item->contenido, 100) }}</p>
                    <a href="{{ route('noticias.show', $item->idnoticias) }}"
                        class="btn btn-primary stretched-link">Leer Más</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
