  @extends('layouts.app')

  @section('content')
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-md-12">
                  <div class="card">
                      <div class="card-header">
                          <h4>My Bookmarks</h4>
                      </div>
                      <div class="card-body">
                          <ul class="nav nav-tabs mb-4" id="bookmarkTab" role="tablist">
                              <li class="nav-item">
                                  <a class="nav-link active" id="books-tab" data-bs-toggle="tab" href="#books"
                                      role="tab" aria-controls="books" aria-selected="true">Books</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" id="videos-tab" data-bs-toggle="tab" href="#videos" role="tab"
                                      aria-controls="videos" aria-selected="false">Videos</a>
                              </li>
                          </ul>


                          <div class="tab-content" id="bookmarkTabContent">
                              <div class="tab-pane fade show active" id="books" role="tabpanel"
                                  aria-labelledby="books-tab">
                                  @if (count($bookmarkedBooks) > 0)
                                      <div class="row">
                                          @foreach ($bookmarkedBooks as $book)
                                              <div class="col-md-3 mb-4">
                                                  <div class="card h-100">
                                                      <img src="{{ $book->cover_image }}" class="card-img-top"
                                                          alt="Book Cover">
                                                      <div class="card-body">
                                                          <h5 class="card-title">{{ $book->title }}</h5>
                                                          <p class="card-text">{{ Str::limit($book->description, 100) }}</p>
                                                      </div>
                                                      <div class="card-footer">
                                                          <a href="{{ url('view_resources_book/' . $book->id) }}"
                                                              class="btn btn-primary btn-sm">View Book</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach
                                      </div>
                                  @else
                                      <div class="alert alert-info">
                                          You haven't bookmarked any books yet.
                                      </div>
                                  @endif
                              </div>

                              <div class="tab-pane fade" id="videos" role="tabpanel" aria-labelledby="videos-tab">
                                  @if (count($bookmarkedVideos) > 0)
                                      <div class="row">
                                          @foreach ($bookmarkedVideos as $video)
                                              <div class="col-md-4 mb-4">
                                                  <div class="card h-100">
                                                      <div class="embed-responsive embed-responsive-16by9">
                                                          {{-- <iframe class="embed-responsive-item" src="{{ $video->path }}" allowfullscreen></iframe> --}}
                                                          <img src="{{ $video->cover_image }}" class="card-img-top"
                                                              alt="Video Cover">
                                                      </div>
                                                      <div class="card-body">
                                                          <h5 class="card-title">{{ $video->title }}</h5>
                                                          {{-- <p class="card-text">{{ Str::limit($video->description, 100) }}
                                                          </p> --}}
                                                      </div>
                                                      <div class="card-footer">
                                                          <a href="{{ url('view_resources_video/' . $video->id) }}"
                                                              class="btn btn-primary btn-sm">Watch Video</a>
                                                      </div>
                                                  </div>
                                              </div>
                                          @endforeach
                                      </div>
                                  @else
                                      <div class="alert alert-info">
                                          You haven't bookmarked any videos yet.
                                      </div>
                                  @endif
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  @endsection
