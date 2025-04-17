@extends('layouts.resources')
@section('content')
<main>
    <section class="py-4 py-lg-6 bg-primary">
        <div class="container">
            <div class="row">
                <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                    <div class="d-lg-flex align-items-center justify-content-between">
                        <!-- Content -->
                        <div class="mb-4 mb-lg-0">
                            <h1 class="text-white mb-1">Update Videos</h1>
                            <p class="mb-0 text-white lead">
                                Fill the form and update videos.
                            </p>
                        </div>
                        <div>
                            <a href="{{url('admin')}}" class="btn btn-white">Back to Resources</a>
                            <!-- <a href="" class="btn btn-dark">Save</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Page Content -->
    <section class="pb-8">
        <div class="container">
            <div id="courseForm" class="bs-stepper">
                <div class="row">
                    <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
                        <!-- Stepper Button -->
                        <form action="{{url('update_video/' . $video->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div>
                                <!-- Card -->
                                <div class="card mb-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Upload Video</h4>
                                    </div>
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
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="addCourseTitle" class="form-label">Video Title</label>
                                            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                            <input
                                                value="{{$video->title}}"
                                                id="addCourseTitle"
                                                name="title"
                                                class="form-control"
                                                type="text"
                                                placeholder="Video Title " />
                                            <small>Write a 60 character video title.</small>
                                        </div>
                                        <div class="mb-3">
                                            <label for="addCourseTitle" class="form-label">Video path</label>
                                            @error('path') <p class="text-danger">{{ $message }}</p> @enderror
                                            <input
                                                id="addCourseTitle"
                                                name="path"
                                                value="{{$video->path}}"
                                                class="form-control"
                                                type="text"
                                                placeholder="Path name e.g: www.youtube/video/ttbsbssdcbsdhcsd  " />
                                            <!-- <small>Write a 60 character course title.</small> -->
                                        </div>
                                        <div class="mb-3">
                                            @error('video_catergory') <p class="text-danger">{{ $message }}</p> @enderror
                                            <label class="form-label" for="addCourseCategory">Video category</label>
                                            <select
                                                class="form-select"
                                                data-choices=""
                                                id="addCourseCategory"
                                                name="video_catergory">
                                                <option value="">Select category</option>
                                                @foreach ($cate as $items)
                                                <option value="{{$items->id}}" {{ $video->catergory->id == $items->id ? 'selected' : '' }}>{{$items->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- Button -->
                                <button
                                    type="submit"
                                    class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection