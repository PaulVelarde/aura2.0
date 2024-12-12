<div class="row gy-4" id="blog-news-container">
    @forelse ($noticias as $noticia)
        <div class="col-lg-6">
            <article>
                <!-- ... -->
            </article>
        </div>
    @empty
        <p>No hay noticias disponibles en este momento.</p>
    @endforelse
</div>
<div class="mt-4">
    <div class="pagination justify-content-center">
        <ul class="pagination">
            <!-- ... -->
        </ul>
    </div>
</div>
