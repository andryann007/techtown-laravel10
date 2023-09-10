<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="Andryan" />

    <link rel="icon" type="image/png" href="{{ asset('img/assets/logo.png') }}" />

    <title>Dashboard Admin Tech Town | {{ $title }}</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet" />

    <!-- template table bootstrap 5 -->
    <link href="{{ asset('css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/responsive.dataTables.min.css') }}" rel="stylesheet" />

    <!-- Sweet Alert 2 Library-->
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet" />

    <!-- Custom CSS Templates -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />
</head>

<body id="page-top" class="bg-dark">
    <main class="main-content">
        <div class="section">
            <div id="wrapper" class="bg-dark text-white">
                <!-- Sidebar -->
                <ul class="navbar-nav bg-light sidebar sidebar-light accordion" id="accordionSidebar">
                    <!-- Sidebar - Brand -->
                    <a style="justify-content: space-arround; align-items:center;" class="sidebar-brand d-flex" href="/admin">
                        <i class="fas fa-file-invoice" aria-hidden="true"></i>
                        <div class="sidebar-brand-text mx-2">Tech Town</div>
                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider" />

                    <!-- Heading Data Master -->
                    <div class="sidebar-heading">Data Master</div>

                    @if (auth()->user()->hak_akses == 'super-admin')
                    <!-- Nav Item - Data Akun -->
                    <li class="nav-item <?= ($title === 'Data Akun') ? 'active' : ''; ?>">
                        <a class="nav-link" href="/admin/akun">
                            <img src="<?= ($title === 'Data Akun') ? '/img/icons/person-badge-fill.svg' : '/img/icons/person-badge.svg'; ?>" />
                            <span>Data Akun</span></a>
                    </li>
                    @endif

                    <!-- Nav Item - Data Brand -->
                    <li class="nav-item <?= ($title === 'Data Brand') ? 'active' : ''; ?>">
                        <a class="nav-link" href="/admin/brand">
                            <img src="<?= ($title === 'Data Brand') ? '/img/icons/laptop-fill.svg' : '/img/icons/laptop.svg'; ?>" />
                            <span>Data Brand</span></a>
                    </li>

                    <!-- Nav Item - Data Kategori -->
                    <li class="nav-item <?= ($title === 'Data Kategori') ? 'active' : ''; ?>">
                        <a class="nav-link" href="/admin/kategori">
                            <img src="<?= ($title === 'Data Kategori') ? '/img/icons/filter-square-fill.svg' : '/img/icons/filter-square.svg'; ?>" />
                            <span>Data Kategori</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider" />

                    <!-- Heading -->
                    <div class="sidebar-heading">Data Produk</div>

                    <!-- Nav Item - Data Produk -->
                    <li class="nav-item <?= ($title === 'Data Produk' | $title === 'Detail Produk') ? 'active' : ''; ?>">
                        <a class="nav-link" href="/admin/produk">
                            <img src="<?= ($title === 'Data Produk' | $title === 'Detail Produk') ? '/img/icons/box-fill.svg' : '/img/icons/box.svg'; ?>" />
                            <span>Data Produk</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider" />

                    <!-- Heading -->
                    <div class="sidebar-heading">Data Contact Us</div>

                    <!-- Nav Item - Data Contact Us -->
                    <li class="nav-item <?= ($title === 'Data Contact Us') ? 'active' : ''; ?>">
                        <a class="nav-link" href="/admin/contact">
                            <img src="<?= ($title === 'Contact Us') ? '/img/icons/envelope-check-fill.svg' : '/img/icons/envelope-check.svg'; ?>" />
                            <span>Contact Us</span></a>
                    </li>

                    <!-- Divider -->
                    <hr class="sidebar-divider" />

                    <!-- Heading -->
                    <div class="sidebar-heading">Logout</div>

                    <!-- Nav Item - Logout -->
                    <li class="nav-item">
                        <a class="nav-link btnLogout" type="button" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <img src="/img/icons/power.svg" />
                            <span>Logout</span></a>
                    </li>
                </ul>
                <!-- End of Sidebar -->

                <!-- Content Wrapper -->
                <div id="content-wrapper" class="d-flex flex-column">
                    <!-- Main Content -->
                    <div id="content" class="bg-dark text-white">
                        @include('partial.navbar_admin')
                        @yield('content')
                    </div>
                    <!-- End of Main Content -->
                </div>
                <!-- End of Content Wrapper -->
            </div>
        </div>
    </main>

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up" aria-hidden="true"></i>
    </a>


    @include('partial.footer')

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select <b>"Logout"</b> below if you are ready to leave !!!
                </div>
                <div class="modal-footer">
                    <form action="/admin/logout" method="post" enctype="multipart/form-data">
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="fas fa-power-off" aria-hidden="true"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Core JavaScript-->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>

    <script src="{{ asset('js/script.js') }}"></script>

    <script type="text/javascript">
        $('.dataTable').DataTable({
            responsive: true
        });
    </script>
</body>

</html>