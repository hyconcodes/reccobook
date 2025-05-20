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
                            <h1 class="text-white mb-1">Add New Department</h1>
                            <p class="mb-0 text-white lead">
                                Create new Department.
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
                        <form action="{{url('create_resources_catergory')}}" method="post">
                            @csrf
                            <div>
                                <!-- Card -->
                                <div class="card my-3">
                                    <div class="card-header border-bottom px-4 py-3">
                                        <h4 class="mb-0">New Department</h4>
                                    </div>
                                    
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="addCategory" class="form-label">Department</label>
                                            @error('catergory') <p class="text-danger">{{ $message }}</p> @enderror
                                            <input
                                                id="addCategory"
                                                name="catergory"
                                                class="form-control"
                                                type="text"
                                                placeholder="Department " />
                                            <small>Add your catergory...</small>
                                        </div>
                                        <!-- Button -->
                                        <button
                                            type="submit"
                                            class="btn btn-primary">
                                            Save
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!-- LIST ALL CATERGORY? -->
                        <div class="card mb-3">
                            <div class="card-header border-bottom px-4 py-3">
                                <h4 class="mb-0">All Department</h4>
                            </div>

                            <div class="card-body">
                                <div class="mb-3">
                                    @foreach ($cate as $item)
                                    <ul class="d-flex justify-content-between">
                                        <li>{{$item->name}}</li>
                                        <form action="{{url('create_resources_catergory/' . $item->id)}}" method="post" onsubmit="return confirm('Are you sure')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </ul>
                                    @endforeach
                                </div>
                                <div class="mt-5">
                                    {{ $cate->links() }}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection