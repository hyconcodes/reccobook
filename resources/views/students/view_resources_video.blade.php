@extends('layouts.app')
@section('content')
<main>
    <!--Hero Section-->
    <section class="p-lg-5 py-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-5">
                    <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 600px">
                        @php
                        // Extract the YouTube video ID
                        preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $video->path, $matches);
                        $youtubeID = $matches[1] ?? null;
                        @endphp

                        @if ($youtubeID)
                        <iframe class="position-absolute top-0 end-0 start-0 bottom-0 h-100 w-100"
                            width="560"
                            height="315"
                            src="https://www.youtube.com/embed/{{ $youtubeID }}"
                            title="YouTube video"
                            frameborder="0"
                            allowfullscreen>
                        </iframe>
                        @else
                        <p>Invalid path</p>
                        @endif
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 mb-4 mb-xl-0">
                    <!-- Card -->
                    <div class="card mb-5">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h1 class="fw-semibold mb-2">{{ $video->title }}</h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" aria-label="Add to Bookmarks" data-bs-original-title="Add to Bookmarks">
                                    <!-- <i class="fe fe-bookmark fs-4 fs-3 text-inherit"></i> -->
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $video->cover_image }}" class="rounded-circle avatar-md" alt="avatar">
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1">{{ $video->catergory->name }}</h4>
                                        <p class="fs-6 mb-0">added on {{ $video->created_at->format('j, M Y') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <!-- <a href="#" class="btn btn-outline-secondary btn-sm">Follow</a> -->
                                </div>
                            </div>
                        </div>
                        <!-- Nav tabs -->
                    </div>
                    <!-- Card -->

                </div>

            </div>
        </div>
    </section>
    <!--Hero Section-->
    <!--explore categories-->
    <!--explore categories-->
    <!--Now Courses-->

    <!--Now Courses-->
</main>
@if ($showModal)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let modal = new bootstrap.Modal(document.getElementById('langaugeModal'), {
            backdrop: 'static', // Prevent click outside
            keyboard: false // Prevent ESC key
        });
        modal.show();
    });
</script>
@endif

@endsection()