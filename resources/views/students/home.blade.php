@extends('layouts.app')
@section('content')
<main>
    <!--Hero Section-->
    <section class="my-5 mx-3">
        <div class="container bg-light rounded-4 pe-lg-0 overflow-hidden">
            <div class="row align-items-center gy-5 gy-xl-0">
                <div class="col-lg-6 col-12">
                    <div class="d-flex flex-column gap-4 px-lg-6 p-3">
                        <div class="d-flex flex-column gap-3">
                            <h1 class="mb-0 display-4 fw-bold">
                                Empower Your Learning Journey Today
                            </h1>
                            <p class="mb-0 pe-xxl-8 me-xxl-5">
                                Take the first step towards achieving your goals with our
                                comprehensive and engaging online courses.
                            </p>
                        </div>
                        <form class="d-none">
                            <div class="input-group shadow">
                                <label
                                    for="courseCategoryCourse"
                                    class="form-label visually-hidden">Find Mentor</label>
                                <input
                                    type="text"
                                    class="form-control rounded-start-3"
                                    id="courseCategoryCourse"
                                    name="courseCategoryCourse"
                                    placeholder="What do you want to learn?"
                                    aria-label="What do you want to learn?"
                                    aria-describedby="basic-addon2"
                                    required />
                                <button
                                    class="btn btn-primary"
                                    id="basic-addon2"
                                    type="submit">
                                    Explore Courses
                                </button>
                            </div>
                        </form>
                        <div class="d-flex flex-row gap-1 flex-wrap">
                            <a href="#langaugeModal" data-bs-toggle="modal" class="btn btn-tag bg-primary text-white">Explore more</a>
                            <!-- <a href="#!" class="btn btn-tag">Video Courses</a> -->
                            <!-- <a href="#!" class="btn btn-tag">UI/UX designer</a>
                            <a href="#!" class="btn btn-tag">Data Science</a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-12 d-none d-lg-block">
                    <div class="text-center position-relative">
                        <img
                            src="../assets/images/course/woman-hero.png"
                            alt="hero"
                            class="position-relative z-3" />
                        <div class="position-absolute top-0 end-0 bottom-0">
                            <img src="../assets/images/course/side-shape.svg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Hero Section-->
    <!--explore categories-->
    <section class="py-xl-8 py-6">
        <div class="container">
            <div class="row">
                <div class="col-xl-10 col-md-10 col-12 mx-auto">
                    <div class="d-flex flex-column gap-2 text-center mb-xl-7 mb-5">
                        <h2 class="h1 mb-0">Explore Your Interests</h2>
                        <p class="mb-0 px-xl-5">
                            Discover a world of knowledge through our diverse range of
                            resources.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row gy-4">
                @foreach ($resources as $item)
                <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                    <div class="card border">
                        <a href="{{ $item->type == 'book' ? url('view_resources_book/' . $item->id) : url('view_resources_video/' . $item->id) }}">
                            <img src="{{ $item->cover_image }}" alt="avatar" class="card-img-top img-fluid w-100">
                        </a>
                        <div class="card-body d-flex flex-column gap-4">
                            <div class="d-flex flex-column gap-2">
                                <div>
                                    <span class="badge text-light-emphasis bg-light-subtle border border-light-subtle rounded-pill">@if ($item->type == 'book')
                                        Books
                                        @else
                                        Video courses
                                        @endif</span>
                                </div>
                                <h3 class="mb-0 h4">
                                    <a href="{{ $item->type == 'book' ? url('view_resources_book/' . $item->id) : url('view_resources_video/' . $item->id) }}" class="text-inherit">{{ $item->title }}</a>
                                </h3>

                                <small class="text-secondary">added on {{ $item->created_at->format('j, M Y') }}</small>
                            </div>
                            <div>
                                <span class="fw-semibold text-dark">{{ $item->catergory->name }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $resources->links() }}
                </div>

                <h5 class="text-primary text-center">{{$resources->count() == 0 ? "We don't have courses for your preferences for now..." : ''}}</h5>

            </div>
        </div>
    </section>
    <!--explore categories-->
    <!--Now Courses-->
    <section class="py-xl-8 py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-8 col-12 mx-auto">
                    <div class="d-flex flex-column gap-2 text-center mb-xl-7 mb-5">
                        <h2 class="mb-0 h1">Trending Now Courses</h2>
                        <p class="mb-0">
                            Whether you want to advance your career in Artificial Intelligence, getting started in Ai, or
                            explore a passion, we have the right course for you.
                        </p>
                    </div>
                </div>
            </div>
            <div class="position-relative">
                <ul class="controls" id="sliderFirstControls">
                    <li class="prev">
                        <i class="fe fe-chevron-left"></i>
                    </li>
                    <li class="next">
                        <i class="fe fe-chevron-right"></i>
                    </li>
                </ul>
                <div class="sliderFirst">
                    @foreach ($trending as $item)
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="card border">
                            <a href="{{ $item->type == 'book' ? url('view_resources_book/' . $item->id) : url('view_resources_video/' . $item->id) }}">
                                <img src="{{ $item->cover_image }}" alt="avatar" class="card-img-top img-fluid w-100">
                            </a>
                            <div class="card-body d-flex flex-column gap-4">
                                <div class="d-flex flex-column gap-2">
                                    <div>
                                        <span class="badge text-light-emphasis bg-light-subtle border border-light-subtle rounded-pill">@if ($item->type == 'book')
                                            Books
                                            @else
                                            Video courses
                                            @endif</span>
                                    </div>
                                    <h3 class="mb-0 h4">
                                        <a href="{{ $item->type == 'book' ? url('view_resources_book/' . $item->id) : url('view_resources_video/' . $item->id) }}" class="text-inherit">{{ $item->title }}</a>
                                    </h3>

                                    <small class="text-secondary">added on {{ $item->created_at->format('j, M Y') }}</small>
                                </div>
                                <div>
                                    <span class="fw-semibold text-dark">{{ $item->catergory->name }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center mt-8">
                        <a href="#!" class="btn btn-outline-primary">
                            <span>Show All Courses</span>

                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="14"
                                height="14"
                                fill="currentColor"
                                class="bi bi-arrow-right"
                                viewBox="0 0 16 16">
                                <path
                                    fill-rule="evenodd"
                                    d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

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