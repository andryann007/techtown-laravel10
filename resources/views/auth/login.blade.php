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
    <main class="form-signin">
        <section>
            <div class="container container-fluid">
                <div class="row d-flex justify-content-center align-items-center bg-dark text-white my-5">
                    <div class="col-md-9 col-lg-6 col-xl-5">
                        <img src="{{ asset('img/assets/logo.png') }}" class="img-fluid" alt="Sample image">
                    </div>
                    <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1" style="border-radius: 10px;">
                        @if (session()->has('error'))
                        <div class="alert alert-danger alert-dismissible mt-3" role="alert">
                            <b>{{ session('error') }}</b>
                        </div>
                        @endif

                        <form action="/admin/authentikasi" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-title text-center fw-bold mt-3 me-3 h3">Sign In</div>
                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" style="align-items: center;" for="email"><i class="fas fa-envelope" aria-hidden="true"></i> Email address</label>
                                <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter a valid email address" value="{{old('email')}}" autofocus>
                                @error('email')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-3">
                                <label class="form-label" style="align-items: center;" for="password"><i class="fas fa-lock" aria-hidden="true"></i> Password</label>
                                <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="Enter password">
                                @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <!-- Checkbox -->
                                <div class="form-check mb-0">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                                    <label class="form-check-label" for="form2Example3">
                                        Remember me
                                    </label>
                                </div>
                                <a style="text-decoration: none;" href="/admin/forget">Forgot password?</a>
                            </div>

                            <div class="text-center text-lg-start mt-4 pt-2">
                                <button type="submit" class="btn btn-primary btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                                <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a style="text-decoration: none;" href="/admin/register" class="link-danger">Register</a></p>
                            </div>

                        </form>
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