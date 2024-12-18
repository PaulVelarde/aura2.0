@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5" style="color: #0e3271;">Videos de Noticias</h1>

        <!-- Transmisión en vivo de YouTube -->
        <div class="my-4" style="display: {{ $liveVideo ? 'block' : 'none' }}">
            <h2 class="text-center mb-3" style="color: #0e3271;">Transmisión en Vivo</h2>
            @if($liveVideo)
                <div class="row justify-content-center mb-4">
                    <div class="col-12">
                        <div class="video-container">
                            {!! $liveVideo->url !!} <!-- Renderiza el iframe almacenado -->
                        </div>
                        <div class="text-center mt-2">
                            <span class="badge bg-danger animated-pulse">En Vivo</span>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        
        <!-- Videos de YouTube -->
        <div class="my-4" style="display: {{ count($youtubeVideos) > 0 ? 'block' : 'none' }}">
            <h2 class="text-center mb-3" style="color: #0e3271;">Videos de YouTube</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($youtubeVideos as $video)
                    <div class="col">
                        <div class="card shadow-sm border-light rounded h-100 video-card">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $video->titulo }}</h5>
                                <div class="video-container mb-3">
                                    {!! $video->url !!}
                                </div>
                                <a href="{{ $video->url }}" class="btn btn-primary mt-auto" target="_blank">Ver en YouTube</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Videos de Facebook -->
        <div class="my-4" style="display: {{ count($facebookLinks) > 0 ? 'block' : 'none' }}">
            <h2 class="text-center mb-3" style="color: #0e3271;">Videos de Facebook</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($facebookLinks as $video)
                    <div class="col">
                        <div class="card shadow-sm border-light rounded h-100 video-card">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $video->titulo }}</h5>
                                <div class="video-container mb-3">
                                    {!! $video->url !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Videos de TikTok -->
        <div class="my-4" style="display: {{ count($tikTokReels) > 0 ? 'block' : 'none' }}">
            <h2 class="text-center mb-3" style="color: #0e3271;">Videos de TikTok</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($tikTokReels as $video)
                    <div class="col">
                        <div class="card shadow-sm border-light rounded h-100 video-card">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $video->titulo }}</h5>
                                <div class="video-container mb-3">
                                    {!! $video->url !!}
                                </div>
                                <a href="{{ $video->url }}" class="btn btn-primary mt-auto" target="_blank">Ver en TikTok</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <style>
        .video-container {
            position: relative;
            padding-bottom: 56.25%;
            /* Relación 16:9 */
            height: 0;
            overflow: hidden;
            max-width: 100%;
            background: #000;
            margin-bottom: 1rem;
            transition: transform 0.5s ease-in-out;
        }

        .video-container iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 30px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #071c45;
            transition: color 0.3s;
        }

        .card-title:hover {
            color: #21b4e1;
        }

        .badge {
            font-size: 1rem;
            padding: 0.5rem 1rem;
            animation: pulse 2s infinite;
        }

        .btn-primary {
            background-color: #0e3271;
            border: none;
            transition: background-color 0.3s;
        }

        .btn-primary:hover {
            background-color: #21b4e1;
        }

        .animated-pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
    </style>
@endpush
