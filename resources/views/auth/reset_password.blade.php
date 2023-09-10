<!DOCTYPE html>
<html>

<head>
    <!-- Fontawesome Templates -->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap 5 Templates -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom CSS Templates -->
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css" />

    <link rel="icon" type="image/png" href="{{ asset('img/assets/logo.png') }}" />

    <title>Dashboard Admin Techtown | Reset Password</title>
</head>

<body class="bg-dark">
    <main class="form-reset">
        <section>
            <div class="container container-fluid">
                <div class="row d-flex justify-content-center align-items-center bg-dark text-white my-5">
                    <div class="col-sm-3 col-md-9 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <div class="card bg-light text-dark" style="padding: 20px;">
                            <div class="card-title text-center fw-normal mt-3 me-3 h3">Reset Password</div>
                            <form action="/admin/reset_password" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="token" id="token" value="{{$token}}" />

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" style="align-items: center;" for="email"><i class="fas fa-envelope" aria-hidden="true"></i> Your email</label>
                                        <input type="email" name="email" id="email" class="form-control" autofocus />
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" style="align-items: center;" for="password"><i class="fas fa-lock" aria-hidden="true"></i> Your new password</label>
                                        <input type="password" name="password" id="password" class="form-control" />
                                    </div>
                                </div>

                                <div class="d-flex flex-row align-items-center mb-4">
                                    <div class="form-outline flex-fill mb-0">
                                        <label class="form-label" style="align-items: center;" for="password_confirmation"><i class="fas fa-key" aria-hidden="true"></i> Repeat your new password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" />
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mb-3 mb-lg-4">
                                    <button type="submit" class="btn btn-primary btn-lg">Reset Password</button>
                                </div>

                                <div class="text-center">
                                    <p class="small fw-normal mt-2 pt-1 mb-0">Already Reset Password ? <a class="fw-bold" style="text-decoration: none;" href="/admin/login">Login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    @include('partial.footer')

    <!-- Core JavaScript-->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.min.js') }}"></script>
</body>

</html>