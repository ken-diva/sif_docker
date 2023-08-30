<header>
  <div class="container-fluid">
    <div class="card">
      <nav class="navbar navbar-expand navbar-light ">
        <div class="container-fluid">
          <a href="#" class="burger-btn d-block">
            <i class="bi bi-justify fs-3"></i>
          </a>

          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-lg-0">
            </ul>
            <div class="dropdown">
              <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                <div class="user-menu d-flex">
                  <div class="user-name text-end me-3">
                    {{-- <h6 class="mb-0 text-gray-600">{{ $d->fullname }}</h6>
                    <p class="mb-0 text-sm text-gray-600">{{ $d->email }}</p> --}}
                    <i>Login as:</i>
                    <h6 class="mb-0 text-gray-600">{{ session('username') }}</h6>
                    {{-- <p class="mb-0 text-sm text-gray-600">Welcome to SIF</p> --}}
                  </div>
                  <div class="user-img d-flex align-items-center">
                    <div class="avatar avatar-md">
                      <img src="{{ asset('dist/assets/images/faces/user.png') }}">
                      {{-- <img src="{{ $d->photourl }}"> --}}
                    </div>
                  </div>
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton"
                style="min-width: 11rem;">
                {{-- <li>
                  <a class="dropdown-item" href="#">
                    <i class="icon-mid bi bi-person me-2"></i>
                    My Profile
                  </a>
                </li> --}}
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="/logout" onclick="alert('Akhiri sesi Anda?')">
                    <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                    Logout
                  </a>
                </li>

                {{-- ini kalau mau pakai modal --}}
                {{-- <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#default"><i
                      class="icon-mid bi bi-box-arrow-left me-2"></i>
                    Logout</a></li> --}}
              </ul>
            </div>
          </div>
        </div>
      </nav>
    </div>
  </div>
</header>

<!--Basic Modal -->
{{-- <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel1">Confirm Logout</h5>
        <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
          <i data-feather="x"></i>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Session anda akan berakhir.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn" data-bs-dismiss="modal">
          <i class="bx bx-x d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Close</span>
        </button>
        <button type="button" class="btn btn-primary ml-1" data-bs-dismiss="modal">
          <i class="bx bx-check d-block d-sm-none"></i>
          <span class="d-none d-sm-block">Accept</span>
        </button>
      </div>
    </div>
  </div>
</div> --}}
