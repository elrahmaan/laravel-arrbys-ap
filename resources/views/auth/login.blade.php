<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AP1 Series | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="stylesheet" href="assets/css/pages/auth.css">
</head>

<body>

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div id="auth">
            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" style="width: 250px; height: 250px; margin-bottom: -120px; margin-top: -120px"></a>
                        </div>
                        <h1 class="auth-title">Log in.</h1>
                        <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

                        <x-jet-validation-errors class="pb-4" />
                        @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ session('status') }}
                        </div>
                        @endif

                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <div class="form-group position-relative has-icon-left mb-4">
                            <x-jet-input id="email" type="email" name="email" :value="old('email')" required autofocus class="form-control form-control-xl" placeholder="Email" />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <div class="form-group position-relative has-icon-left mb-0">
                            <x-jet-input id="password" type="password" class="form-control form-control-xl" placeholder="Password" name="password" required autocomplete="current-password" />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>

                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right">
                        <div class="bandara">
                            <img class="ms-5" src="assets/images/logistic.png" width="90%" alt="" style="margin-top: 160px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </form>

</body>

</html>