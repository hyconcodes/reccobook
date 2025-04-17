@extends('layouts.admin')
@section('content')
<main id="page-content">
  @if(session('success'))
  <div class="alert alert-success">
    {{ session('success') }}
  </div>
  @endif

  @if(session('msg') || session('error'))
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
        <div class="border-bottom pb-3 mb-3 d-flex flex-column flex-md-row gap-3 align-items-md-center justify-content-between">
          <div class="d-flex flex-column gap-1">
            <h1 class="mb-0 h2 fw-bold">Resources</h1>
            <!-- Breadcrumb -->
            <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="admin-dashboard">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="#">Courses</a>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">All</li>
                    </ol>
                  </nav> -->
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
              <h5 class="m-5"><span class="fw-bold text-primary">Video title:</span> {{$video->title}}</h5>
              <h5 class="m-5"><span class="fw-bold text-primary">Video Category:</span> {{$video->catergory->name}}</h5>
              <hr>
              <div class="mt-3 d-flex justify-content-center align-items-center position-relative rounded py-16 border-white border rounded bg-cover" style="
                              background-image: url('{{ $video->cover_image }}');
                              height: 250px;
                            ">
                <a href="{{$video->path}}" class="icon-shape rounded-circle btn-play icon-xl glightbox position-absolute top-50 start-50 translate-middle">
                  <i class="bi bi-play-fill fs-3"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection