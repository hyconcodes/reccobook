@extends('layouts.admin')
@section('content')
    <main id="page-content">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('msg') || session('error'))
            <div class="alert alert-danger">
                {{ session('msg') ?? session('error') }}
            </div>
        @endif
        @include('includes.admin_main_header')
        <!-- Container fluid -->
        <section class="container-fluid p-4">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Page Header -->
                    <div
                        class="border-bottom pb-3 mb-3 d-flex flex-column flex-md-row gap-3 align-items-md-center justify-content-between">
                        <div class="d-flex flex-column gap-1">
                            <h1 class="mb-0 h2 fw-bold">Resources</h1>
                            <!-- Breadcrumb -->
                        </div>
                        <div class="d-flex gap-4">
                            <div>
                                <a href="{{ url('admin_books_create') }}" class="btn btn-primary">Add New Books</a>
                            </div>
                            <div>
                                <a href="{{ url('admin_videos_create') }}" class="btn btn-primary">Add New Videos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-12">
                    <!-- Card -->
                    <div class="card rounded-3">
                        <!-- Card header -->
                        <div class="card-header p-0">
                            <div>
                                <!-- Nav -->
                                <div class="d-flex m-5 gap-5 align-items-center justify-content-between">
                                    <div class="">
                                        <h5><span class="fw-bold text-primary">Book title:</span> {{ $book->title }}</h5>
                                        <h5><span class="fw-bold text-primary">Book Category:</span>
                                            {{ $book->catergory->name }}</h5>
                                    </div>
                                    <div>
                                        <a href="{{ asset('storage/' . $book->path) }}" download
                                            class="btn btn-success btn-sm w-100 w-md-auto">
                                            <i class="fas fa-download me-2"></i>Download Book
                                        </a>
                                    </div>
                                </div>
                                <hr>
                                {{-- <p style="color: white;">{{ asset('storage/' . $book->path) }}</p> --}}
                                {{-- <iframe src="/storage/{{ $book->path }}#toolbar=0&navpanes=0&scrollbar=0" width="100%"
                                    height="800px" style="border: none;" frameborder="0"></iframe> --}}
                                <iframe src="{{ asset('storage/' . $book->path) }}#toolbar=0&navpanes=0&scrollbar=0"
                                    width="100%" height="800px" style="border: none;" frameborder="0"></iframe>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
