<!--begin::Header-->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!--begin::Container-->


    
    <div class="container-fluid">
      <!--begin::Start Navbar Links-->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="{{ url('/') }}" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li>
      </ul>
      </ul>
      <!--end::Start Navbar Links-->
      <!--begin::End Navbar Links-->
      <ul class="navbar-nav ml-auto">
        <!--begin::Navbar Search-->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="bi bi-search"></i>
          </a>
        </li>
        <!--end::Navbar Search-->
        <!--begin::Messages Dropdown Menu-->
        <li class="nav-item dropdown">
          <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="bi bi-chat-text"></i>
            <span class="navbar-badge badge text-bg-danger">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <a href="#" class="dropdown-item">
              <!--begin::Message-->
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img
                    src="../../../adminlte/dist/assets/img/user1-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                  />
                </div>
                <div class="flex-grow-1">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-end fs-7 text-danger"
                      ><i class="bi bi-star-fill"></i
                    ></span>
                  </h3>
                  <p class="fs-7">Call me whenever you can...</p>
                  <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!--begin::Message-->
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img
                    src="../../../dist/assets/img/user8-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                  />
                </div>
                <div class="flex-grow-1">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-end fs-7 text-secondary">
                      <i class="bi bi-star-fill"></i>
                    </span>
                  </h3>
                  <p class="fs-7">I got your message bro</p>
                  <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <!--begin::Message-->
              <div class="d-flex">
                <div class="flex-shrink-0">
                  <img
                    src="../../../dist/assets/img/user3-128x128.jpg"
                    alt="User Avatar"
                    class="img-size-50 rounded-circle me-3"
                  />
                </div>
                <div class="flex-grow-1">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-end fs-7 text-warning">
                      <i class="bi bi-star-fill"></i>
                    </span>
                  </h3>
                  <p class="fs-7">The subject goes here</p>
                  <p class="fs-7 text-secondary">
                    <i class="bi bi-clock-fill me-1"></i> 4 Hours Ago
                  </p>
                </div>
              </div>
              <!--end::Message-->
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <!--end::Messages Dropdown Menu-->
        <!--begin::Notifications Dropdown Menu-->
        <li class="nav-item dropdown">
          <a class="nav-link" data-bs-toggle="dropdown" href="#">
            <i class="bi bi-bell-fill"></i>
            <span class="navbar-badge badge text-bg-warning">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <span class="dropdown-item dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="bi bi-envelope me-2"></i> 4 new messages
              <span class="float-end text-secondary fs-7">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="bi bi-people-fill me-2"></i> 8 friend requests
              <span class="float-end text-secondary fs-7">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="bi bi-file-earmark-fill me-2"></i> 3 new reports
              <span class="float-end text-secondary fs-7">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer"> See All Notifications </a>
          </div>
        </li>
        <!--end::Notifications Dropdown Menu-->
        <!--begin::Fullscreen Toggle-->
        <li class="nav-item">
          <a class="nav-link" href="#" data-lte-toggle="fullscreen">
            <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i>
            <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none"></i>
          </a>
        </li>
        <!--end::Fullscreen Toggle-->
        <!--begin::User Menu Dropdown-->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <img
              src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('adminlte/dist/img/user2-160x160.jpg') }}"
              class="img-circle"
              alt="User Image"
              style="width: 25px; height: 25px;"
            />
            <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-end">
            <!--begin::User Image-->
            <li class="user-header text-bg-primary">
              <img
                  src="{{ Auth::user()->profile_photo ? asset('storage/' . Auth::user()->profile_photo) : asset('adminlte/dist/img/user2-160x160.jpg') }}"
                  class="rounded-circle shadow"
                  alt="Foto Profil"
              />
              <p>
                  {{ Auth::user()->name }} - Web Developer
                  <small>Anggota sejak {{ Auth::user()->created_at->format('d-m-Y') }}</small>
              </p>
          </li>
            <!--end::User Image-->
            <!--begin::Menu Body-->
            <li class="user-body">
              <!--begin::Row-->
              <div class="row">
                <div class="col-4 text-center"><a href="#">Followers</a></div>
                <div class="col-4 text-center"><a href="#">Sales</a></div>
                <div class="col-4 text-center"><a href="#">Friends</a></div>
              </div>
              <!--end::Row-->
            </li>
            <!--end::Menu Body-->
            <!--begin::Menu Footer-->
            <li class="user-footer">
              <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a>
              </li>
              <a href="#" class="btn btn-default btn-flat float-end">Sign out</a>
            </li>
            <!--end::Menu Footer-->
          </ul>
        </li>
        <!--end::User Menu Dropdown-->
      </ul>
      <!--end::End Navbar Links-->
    </div>
    <!--end::Container-->
  </nav>
  <!--end::Header-->
  <!-- Modal untuk Edit Profil -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProfileModalLabel">Edit Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <form action="{{ route('profile.update-photo') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-3">
                        <label for="profile_photo" class="form-label">Foto Profil</label>
                        <input type="file" name="profile_photo" id="profile_photo" class="form-control" accept="image/*">
                        @error('profile_photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Foto Saat Ini</label><br>
                        @if (Auth::user()->profile_photo)
                            <img src="{{ asset('storage/' . Auth::user()->profile_photo) }}" alt="Foto Profil" width="100" class="rounded-circle">
                        @else
                            <p>Belum ada foto profil</p>
                        @endif
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>