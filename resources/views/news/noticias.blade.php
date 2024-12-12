@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')


<div id="carousel-5" data-carousel='{ "loadingClasses": "opacity-0" }' class="relative w-full">
    <div class="carousel h-96">
      <div class="carousel-body h-3/4 opacity-0">
        <!-- Slide 1 -->
        <div class="carousel-slide">
          <div class="flex size-full justify-center">
            <img src="https://cdn.flyonui.com/fy-assets/components/carousel/image-21.png" class="size-full object-cover" alt="mountain" />
          </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-slide">
          <div class="flex size-full justify-center">
            <img src="https://cdn.flyonui.com/fy-assets/components/carousel/image-14.png" class="size-full object-cover" alt="sand" />
          </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-slide">
          <div class="flex size-full justify-center">
            <img src="https://cdn.flyonui.com/fy-assets/components/carousel/image-7.png" class="size-full object-cover" alt="cloud" />
          </div>
        </div>
      </div>
      <div class="carousel-pagination bg-base-100 bottom-0 z-[1] h-1/4 justify-between gap-2 space-x-0 pt-2 overflow-y-auto">
        <img
          src="https://cdn.flyonui.com/fy-assets/components/carousel/image-21.png"
          class="carousel-active:opacity-100 grow object-cover opacity-30"
          alt="mountain"
        />
        <img
          src="https://cdn.flyonui.com/fy-assets/components/carousel/image-14.png"
          class="carousel-active:opacity-100 grow object-cover opacity-30"
          alt="sand"
        />
        <img
          src="https://cdn.flyonui.com/fy-assets/components/carousel/image-7.png"
          class="carousel-active:opacity-100 grow object-cover opacity-30"
          alt="cloud"
        />
      </div>
    </div>
    <!-- Previous Slide -->
    <button type="button" class="carousel-prev">
      <span class="mb-15" aria-hidden="true">
        <span class="size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow">
          <span class="icon-[tabler--chevron-left] size-5 cursor-pointer rtl:rotate-180"></span>
        </span>
      </span>
      <span class="sr-only">Previous</span>
    </button>
    <!-- Next Slide -->
    <button type="button" class="carousel-next">
      <span class="sr-only">Next</span>
      <span class="mb-15" aria-hidden="true">
        <span class="size-9.5 bg-base-100 flex items-center justify-center rounded-full shadow">
          <span class="icon-[tabler--chevron-right] size-5 cursor-pointer rtl:rotate-180"></span>
        </span>
      </span>
    </button>
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
