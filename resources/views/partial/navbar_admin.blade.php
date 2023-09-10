<nav class="navbar navbar-expand navbar-light bg-secondary topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-light d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <div class="copyright text-center my-auto d-sm-flex">
        <div class="text-light" id="clock">
        </div>
    </div>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-white">
                    Halo, <b>{{auth()->user()->name}}</b>
                </span>
                @if (auth()->user()->gambar_profil == null)
                <img src="{{asset('img/assets/undraw_profile.svg')}}" alt="Gambar Profil" class="img-profile rounded-circle">
                @endif

                @if (auth()->user()->gambar_profil != null)
                <img src="{{asset('storage/'. auth()->user()->gambar_profil)}}" alt="Gambar Profil" class="img-profile rounded-circle">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="/admin/my_profile">
                    <i class="fas fa-user fa-md fa-fw mr-2 text-dark"></i>
                    Profile
                </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                    <i class="fas fa-power-off fa-md fa-fw mr-2 text-dark" aria-hidden="true"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<script type="text/javascript">
    function showTime() {
        var d = new Date();
        var timezone = {
            timeZone: 'Asia/Jakarta'
        };
        var dateTime = d;

        document.getElementById('clock').innerHTML = "<b>" + dateTime + "</b>";
        setTimeout(showTime, 1000);
    }

    showTime();
</script>