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
              <ul class="nav nav-lb-tab border-bottom-0" id="tab" role="tablist">
              <li class="nav-item">
                  <a class="nav-link" href="{{url('admin')}}" >Books</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link active" href="{{url('videos_resources')}}">Videos</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="p-4 row">
            <!-- Form -->
            <form action="{{url('search_videos')}}" method="get" class="d-flex align-items-center col-12 col-md-12 col-lg-12">
              <span class="position-absolute ps-3 search-icon"><i class="fe fe-search"></i></span>
              <input type="search" name="search" class="form-control ps-6" placeholder="Search videos" />
            </form>
            @error('search') <p class="text-danger text-center">{{ $message }}</p> @enderror
          </div>
          <div>
            <!-- Table -->
            <div class="tab-content" id="tabContent">
              <!--Tab pane -->
              <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <div class="table-responsive border-0 overflow-y-hidden">
                  <table class="table mb-0 text-nowrap table-centered table-hover">
                    <thead class="table-light">
                      <tr>
                        <th>Videos</th>
                        <th>Catergory</th>
                        <th>Action</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($videos as $video)
                      <tr>
                        <td>
                          <a href="{{url('view_video/' . $video->id)}}" class="text-inherit">
                            <div class="d-flex align-items-center gap-3">
                              <div>
                                <img src="{{$video->cover_image}}" alt="" class="img-4by3-lg rounded" />
                              </div>
                              <div class="d-flex flex-column gap-1">
                                <h4 class="mb-0 text-primary-hover">{{ Str::limit($video->title, 50) }}</h4>
                                <span>Added on {{ $video->created_at->format('j, M, Y') }}</span>
                              </div>
                            </div>
                          </a>
                        </td>
                        <td>
                          <div class="d-flex align-items-center flex-row gap-2">
                            <h5 class="mb-0">{{ $video->catergory->name }}</h5>
                          </div>
                        </td>
                        <td class="">
                          <!-- <a href="#" class="btn btn-outline-success btn-sm">View</a> -->
                          <form action="{{url('delete_video/' . $video->id)}}" method="post" onsubmit="return confirm('Are you sure to delete')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                          </form>
                        </td>
                        <td>
                          <span class="dropdown dropstart">
                            <a
                              class="btn-icon btn btn-ghost btn-sm rounded-circle"
                              href="#"
                              role="button"
                              id="courseDropdown1"
                              data-bs-toggle="dropdown"
                              data-bs-offset="-20,20"
                              aria-expanded="false">
                              <i class="fe fe-more-vertical"></i>
                            </a>
                            <span class="dropdown-menu" aria-labelledby="courseDropdown1">
                              <span class="dropdown-header">Settings</span>
                              <a class="dropdown-item" href="{{url('update_video/' . $video->id)}}">
                                <i class="bi bi-pencil-square dropdown-item-icon"></i>
                                Update
                              </a>
                            </span>
                          </span>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card Footer -->
        <div class="card-footer">
          <nav aria-label="Page navigation example">
            <!-- Pagination Links -->
            <div class="mt-4">
              {{ $videos->links() }}
            </div>
          </nav>
        </div>
      </div>
    </div>
    </div>
  </section>
</main>
@endsection