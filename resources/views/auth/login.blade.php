<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BorrowLab</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Welcome back!</h1>
            <p class="sign-up__subtitle">Sign in to your account to continue</p>
            <form class="sign-up-form form" method="POST" action="{{ route('login') }}">
                @csrf
                <label class="form-label-wrapper">
                    <p class="form-label">NISN</p>
                    <input id="nisn" type="text"
                        class="form-control form-input @error('nisn') is-invalid @enderror()" name="nisn"
                        value="{{ old('nisn') }}" required autocomplete="nisn" autofocus
                        placeholder="Enter your NISN">
                    @error('nisn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input id="password" type="password"
                        class="form-control form-input @error('password') is-invalid @enderror()" name="password"
                        required autocomplete="current-password" placeholder="Enter your Password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <div class="d-flex justify-content-center">
                    <a class="link-info forget-link" href="{{ route('register') }}">Don't have an account? Register
                        now!</a>
                </div>

                <label class="form-checkbox-wrapper">
                    <input class="form-checkbox form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-checkbox-label">Remember me</span>
                </label>
                <button class="form-btn primary-default-btn transparent-btn">Sign In</button>

                <div class="d-flex justify-content-center">
                    <a class="link-info forget-link" href="/">Want to get back to the dashboard?</a>
                </div>
            </form>
        </article>
    </main>
    <!-- Chart library -->
    <script src="plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>
