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
                            <h1 class="text-white mb-1">Update A Book</h1>
                            <p class="mb-0 text-white lead">
                                Fill the form and update books.
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
                        <form action="{{url('update_book/' . $book->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <!-- Card -->
                                <div class="card my-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">Update book</h4>
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
                                            <label for="formFile" class="form-label">Books Media</label>
                                            @error('book') <p class="text-danger">{{ $message }}</p> @enderror
                                            <input class="form-control" name="book" type="file" id="formFile">
                                        </div>
                                        <div class="mb-3">
                                            <label for="addCourseTitle" class="form-label">Book Title</label>
                                            @error('title') <p class="text-danger">{{ $message }}</p> @enderror
                                            <input
                                                id="addCourseTitle"
                                                name="title"
                                                class="form-control"
                                                type="text"
                                                value="{{ $book->title }}"
                                                placeholder="book Title " />
                                            <small>Write a 60 character book title.</small>
                                        </div>
                                        <div class="mb-3">
                                            @error('book_catergory') <p class="text-danger">{{ $message }}</p> @enderror
                                            <label class="form-label" for="addCourseCategory">Books category</label>
                                            <select
                                                class="form-select"
                                                data-choices=""
                                                id="addCourseCategory"
                                                name="book_catergory">
                                                <option value="">Select category</option>
                                                @foreach ($cate as $items)
                                                <option value="{{$items->id}}" {{ $book->catergory->id == $items->id ? 'selected' : '' }} >{{$items->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button
                                            type="submit"
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>
                                </div>
                                <!-- Button -->
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection