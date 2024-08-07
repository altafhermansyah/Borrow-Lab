<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BorrowLab</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="./img/svg/logo.svg" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="./css/style.min.css">
</head>

<body>
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            <h1 class="sign-up__title">Register Now!</h1>
            <p class="sign-up__subtitle">Looking for more? Register now and discover the benefits!</p>
            <form class="sign-up-form form" method="POST" action="{{ route('register') }}">
                @csrf
                <label class="form-label-wrapper">
                    <p class="form-label">Name</p>
                    <input id="name" type="text"
                        class="form-control form-input @error('name') is-invalid @enderror" name="name"
                        value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter your name"
                        required>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">NISN</p>
                    <input id="nisn" type="text"
                        class="form-control form-input @error('nisn') is-invalid @enderror" name="nisn"
                        value="{{ old('nisn') }}" required autocomplete="nisn" placeholder="Enter your NISN" required>

                    @error('nisn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="form-label-wrapper">
                    <p class="form-label">Password</p>
                    <input id="password" type="password"
                        class="form-control form-input @error('password') is-invalid @enderror" name="password" required
                        autocomplete="new-password" placeholder="Enter your password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </label>
                <label class="form-checkbox-wrapper">
                    <input class="form-checkbox form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="form-checkbox-label">Remember me next time</span>
                </label>
                <button type="submit" class="form-btn primary-default-btn transparent-btn">
                    {{ __('Sign Up') }}
                </button>
    </main>
    <!-- Chart library -->
    <script src="./plugins/chart.min.js"></script>
    <!-- Icons library -->
    <script src="plugins/feather.min.js"></script>
    <!-- Custom scripts -->
    <script src="js/script.js"></script>
</body>

</html>
