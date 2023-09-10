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

    <title>Dashboard Admin Techtown | {{ $title }}</title>
</head>

<body class="bg-dark">
    <main class="form-forget">
        <section>
            <div class="container container-fluid">
                <div class="row d-flex justify-content-center align-items-center bg-dark text-white my-5">
                    <div class="col-sm-3 col-md-9 col-lg-6 col-xl-5 order-2 order-lg-1">
                        <div class="card bg-light text-dark" style="padding:20px;">
                            @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                                <b>{{ session('error') }}</b>
                            </div>
                            @endif

                            @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible mt-3" role="alert">
                                <b>{{ session('success') }}</b>
                            </div>
                            @endif
                            <form action="/admin/send_token" method="post">
                                @csrf
                                <div class="card-title text-center fw-normal mt-3 me-3 h3">Password Reset</div>
                                <div class="card-body">
                                    <p class="card-text py-2">
                                        Enter your email address and we'll send you an email with instructions to reset your password.
                                    </p>
                                    <div class="d-flex flex-row align-items-center mb-4">

                                        <div class="form-outline flex-fill mb-0">
                                            <label class="form-label" for="email" style="align-items: center"><i class="fas fa-envelope" aria-hidden="true"></i> Enter Your Email</label>
                                            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" autofocus />
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-end mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Send Reset Token</button>
                                    </div>

                                    <p class="small text-center fw-normal mt-2 pt-1 mb-0">Already Have Reset Token ? <a class="fw-bold" style="text-decoration: none;" href="/admin/reset">Reset Password</a></p>
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