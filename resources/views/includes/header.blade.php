<nav class="navbar navbar-expand-lg">
    <div class="container px-0">
        <a class="navbar-brand fw-bold" href="{{ url('home') }}">Reccobook</a>
        <!-- Mobile view nav wrap -->
        <div class="ms-auto d-flex align-items-center order-lg-3">
            <div class="d-flex gap-2 align-items-center">
                <a
                    href="#langaugeModal"
                    class="text-inherit me-2"
                    data-bs-toggle="modal">
                    <i class="bi bi-ui-radios-grid"></i>
                </a>
                <img class="ms-3" style="cursor: pointer;" src="{{Auth::user()->avatar}}" alt="">
                <!-- <a href="sign-in.html" class="btn btn-outline-dark">Login</a>
                <a href="sign-up.html" class="btn btn-dark d-none d-md-block">Join Now</a> -->
            </div>
        </div>
        <div>
            <!-- Button -->
            <button
                class="navbar-toggler collapsed ms-2"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbar-default"
                aria-controls="navbar-default"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="icon-bar top-bar mt-0"></span>
                <span class="icon-bar middle-bar"></span>
                <span class="icon-bar bottom-bar"></span>
            </button>
        </div>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbar-default">
            <ul class="navbar-nav mt-3 mt-lg-0 mx-xxl-auto">

                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#"
                        id="navbarAccount"
                        data-bs-toggle="dropdown"
                        aria-haspopup="true"
                        aria-expanded="false">Accounts</a>
                    <ul
                        class="dropdown-menu dropdown-menu-arrow"
                        aria-labelledby="navbarAccount">
                        <li>
                            <h4 class="dropdown-header">Accounts</h4>
                        </li>

                        <li>
                            <a class="dropdown-item" href="{{ url('home') }}">Courses</a>
                        </li>
                        <li>
                            <hr class="mx-3" />
                        </li>
                        <li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div
    class="modal fade"
    id="langaugeModal"
    tabindex="-1"
    aria-labelledby="langaugeModalLabel"
    aria-hidden="true">
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
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ url('user_interests_save') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="modal-title" id="langaugeModalLabel">
                            Choose your interests
                        </h3>
                        <button
                            type="button"
                            class="btn-close d-none"
                            data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="row row-cols-2 row-cols-lg-3 g-2 g-lg-3 mb-3">
                        @foreach ($catergories as $cate)
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="checkbox"
                                name="catergories[]"
                                value="{{ $cate->id }}"
                                id="cate-{{ $cate->id }}"
                                @if($userInterest->pluck('id')->contains($cate->id)) checked @endif
                            >
                            @error('catergories') <p class="text-danger">{{ $message }}</p> @enderror
                            <label class="form-check-label fw-semibold" for="cate-{{ $cate->id }}">
                                {{ $cate->name }}
                            </label>
                        </div>
                        @endforeach
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>