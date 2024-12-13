@extends('layouts.app')

@section('title', 'Inicio - Aura Noticias')

@section('content')


    <main class="main">

        <!-- Page Title -->
        <div class="page-title dark-background" data-aos="fade"
            style="background-image: url(assets/img/portfolio-page-title-bg.jpg);">
            <div class="container">
                <h1>Videos</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="index.html">Home</a></li>
                        <li class="current">Videos</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Video Section -->
        <section id="videos" class="portfolio section">

            <div class="container">

                <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

                    <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                        <li data-filter="*" class="filter-active">All</li>
                        <li data-filter=".filter-video">Videos</li>
                    </ul><!-- End Portfolio Filters -->

                    <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                        <!-- Video 1 -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-video">
                            <img src="assets/img/portfolio/video-thumbnail-1.jpg" class="img-fluid" alt="Video 1">
                            <div class="portfolio-info">
                                <h4>Video 1</h4>
                                <p>Descripción del primer video.</p>
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" title="Video 1"
                                    class="glightbox preview-link" data-gallery="portfolio-gallery-video">
                                    <i class="bi bi-play-circle"></i> <span>Watch Video</span>
                                </a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Video 2 -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-video">
                            <img src="assets/img/portfolio/video-thumbnail-2.jpg" class="img-fluid" alt="Video 2">
                            <div class="portfolio-info">
                                <h4>Video 2</h4>
                                <p>Descripción del segundo video.</p>
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" title="Video 2"
                                    class="glightbox preview-link" data-gallery="portfolio-gallery-video">
                                    <i class="bi bi-play-circle"></i> <span>Watch Video</span>
                                </a>
                            </div>
                        </div><!-- End Portfolio Item -->

                        <!-- Video 3 -->
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-video">
                            <img src="assets/img/portfolio/video-thumbnail-3.jpg" class="img-fluid" alt="Video 3">
                            <div class="portfolio-info">
                                <h4>Video 3</h4>
                                <p>Descripción del tercer video.</p>
                                <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" title="Video 3"
                                    class="glightbox preview-link" data-gallery="portfolio-gallery-video">
                                    <i class="bi bi-play-circle"></i> <span>Watch Video</span>
                                </a>
                            </div>
                        </div><!-- End Portfolio Item -->

                    </div><!-- End Portfolio Container -->

                </div>

            </div>

        </section><!-- /Video Section -->

    </main>
