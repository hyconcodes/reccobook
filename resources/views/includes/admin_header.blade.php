      <!-- Sidebar -->
      <nav class="navbar-vertical navbar" style="background-color: #003b00;">
          <div class="vh-100" data-simplebar>
              <!-- Brand logo -->
              <a class="navbar-brand" href="">
                  <h1 class="fw-bold text-primary fs-4">Edu Resource Recommender</h1>
              </a>
              <!-- Navbar nav -->
              <ul class="navbar-nav flex-column" id="sideNavbar">
                  <li class="nav-item d-none">
                      <a
                          class="nav-link  collapsed "
                          href="#"
                          data-bs-toggle="collapse"
                          data-bs-target="#navDashboard"
                          aria-expanded="false"
                          aria-controls="navDashboard">
                          <i class="nav-icon fe fe-home me-2"></i>
                          Dashboard
                      </a>
                      <div id="navDashboard" class="collapse " data-bs-parent="#sideNavbar">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link " href="{{url('admin')}}">Overview</a>
                              </li>
                              <!-- Nav item -->
                          </ul>
                      </div>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link " href="#" data-bs-toggle="collapse" data-bs-target="#navCourses" aria-expanded="false" aria-controls="navCourses">
                          <i class="nav-icon fe fe-book me-2"></i>
                          Resources
                      </a>
                      <div id="navCourses" class="collapse  show " data-bs-parent="#sideNavbar">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link active " href="{{ url('admin') }}">Books</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="{{ url('videos_resources') }}">Videos</a>
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link " href="{{url('create_resources_catergory')}}">Resources Category</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <!-- Nav item -->
                  <li class="nav-item d-none">
                      <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse" data-bs-target="#navProfile" aria-expanded="false" aria-controls="navProfile">
                          <i class="nav-icon fe fe-user me-2"></i>
                          User
                      </a>
                      <div id="navProfile" class="collapse " data-bs-parent="#sideNavbar">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link " href="admin-instructor">All users</a>
                              </li>
                          </ul>
                      </div>
                  </li>
                  <!-- Nav item -->
                  <!-- Nav item -->
                  <li class="nav-item">
                      <div class="nav-divider"></div>
                  </li>
                  <!-- Card -->
                  <div class="card bg-dark-primary shadow-none text-center mx-4 my-8 border-0 d-none">
                      <div class="card-body py-6">
                          <img src="{{asset('assets/images/background/giftbox.png')}}" alt="" />
                          <div class="mt-4">
                              <h5 class="text-white">Unlimited Access</h5>
                              <p class="text-white-50 fs-6">Upgrade your plan from a Free trial, to select Premium Plan’. Start Now</p>
                              <a href="#" class="btn btn-white btn-sm mt-2">Upgrade Now</a>
                          </div>
                      </div>
                  </div>
          </div>
      </nav>