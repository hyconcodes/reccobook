@extends('layouts.app')
@section('content')
<main>
    <!--Hero Section-->
    <section class="p-lg-5 py-7">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12 mb-5">
                    <div class="rounded-3 position-relative w-100 d-block overflow-hidden p-0" style="height: 600px">
                        <iframe
                            src="{{asset('storage/' . $book->path) }}#toolbar=0&navpanes=0&scrollbar=0"
                            style="width:100%; height:100%; border: none;">
                        </iframe>
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
                                <h1 class="fw-semibold mb-2">{{ $book->title }}</h1>
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" aria-label="Add to Bookmarks" data-bs-original-title="Add to Bookmarks">
                                    <i class="fe fe-bookmark fs-4 fs-3 text-inherit"></i>
                                </a>
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <img src="{{ $book->cover_image }}" class="rounded-circle avatar-md" alt="avatar">
                                    <div class="ms-2 lh-1">
                                        <h4 class="mb-1">{{ $book->catergory->name }}</h4>
                                        <p class="fs-6 mb-0">added on {{ $book->created_at->format('j, M Y') }}</p>
                                    </div>
                                </div>
                                <div>
                                    <a href="#" class="btn btn-outline-secondary btn-sm">Follow</a>
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
</main>
@if ($showModal)
<script>
    document.addEventListener('DOMContentLoaded', function() {
        let modal = new bootstrap.Modal(document.getElementById('langaugeModal'), {
            backdrop: 'static', // Prevent click outside
            keyboard: false // Prevent ESC key
        });
        modal.show();

        // For displaying books page 1
        // document.addEventListener("DOMContentLoaded", function() {
    //     const url = "{{ asset('storage/' . $book->path) }}";

    //     const loadingTask = pdfjsLib.getDocument(url);
    //     loadingTask.promise.then(function(pdf) {
    //         // Fetch the first page
    //         return pdf.getPage(1).then(function(page) {
    //             const scale = 1.5;
    //             const viewport = page.getViewport({
    //                 scale: scale
    //             });

    //             const canvas = document.getElementById('pdf-canvas');
    //             const context = canvas.getContext('2d');
    //             canvas.height = viewport.height;
    //             canvas.width = viewport.width;

    //             const renderContext = {
    //                 canvasContext: context,
    //                 viewport: viewport
    //             };
    //             page.render(renderContext);
    //         });
    //     }).catch(function(error) {
    //         console.error('Error loading PDF:', error);
    //     });
    // });
    });
</script>
@endif

@endsection()

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.2.8/pdfobject.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        PDFObject.embed("{{ asset('storage/' . $book->path) }}", "#pdf-preview", {
            page: 1, // This ensures it starts at page 1
            pdfOpenParams: {
                page: 1,
                view: "FitH"
            }
        });
    });
</script>
@endsection