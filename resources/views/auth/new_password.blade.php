<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edu Resource Recommender - Reset password</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/favicon/favicon.ico')}}" />

    <!-- darkmode js -->
    <script src="{{asset('assets/js/vendors/darkMode.js')}}"></script>

    <!-- Libs CSS -->
    <link href="{{asset('assets/fonts/feather/feather.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/bootstrap-icons/font/bootstrap-icons.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/libs/simplebar/dist/simplebar.min.css')}}" rel="stylesheet" />

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/theme.min.css')}}">
    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #2d3748;
        }

        .container {
            max-width: 460px;
            margin: 80px auto;
            background-color: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.05);
        }

        h2 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 1.5rem;
            color: #1a202c;
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            font-size: 14px;
        }

        .alert-success {
            background-color: #e6fffa;
            color: #2c7a7b;
        }

        .alert-danger {
            background-color: #ffe6e6;
            color: #c53030;
        }

        label {
            display: block;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        input[type="text"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fafb;
            transition: border 0.3s;
        }

        input[type="text"]:focus {
            border-color: #3182ce;
            outline: none;
            background-color: #fff;
        }

        .error {
            color: #e53e3e;
            font-size: 14px;
            margin-top: 0.3rem;
        }

        button {
            width: 100%;
            padding: 0.75rem;
            font-size: 16px;
            background-color: #4c51bf;
            color: white;
            border: none;
            border-radius: 8px;
            margin-top: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #434190;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Reset your account password</h2>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('msg') || session('error'))
        <div class="alert alert-danger">
            {{ session('msg') ?? session('error') }}
        </div>
        @endif

        <form method="POST" action="{{ url('reset_password') }}">
            @csrf

            <div class="mb-4">
                <label for="password_code">Enter password reset code</label>
                <input type="text" style="color: black;" name="password_code" id="password_code" maxlength="6" placeholder="e.g. 123456" required>
                @error('password_code')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="signUpEmail" class="form-label">Email</label>
                <input type="email" id="signUpEmail" class="form-control" name="email" placeholder="Email address here" required />
                <div class="invalid-feedback">Please enter valid Email.</div>
                @error('email') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <!-- Password -->
            <div class="mb-3">
                <label for="signUpPassword" class="form-label">Password</label>
                <input type="password" id="signUpPassword" class="form-control" name="password" placeholder="**************" required />
                <div class="invalid-feedback">Please enter valid password.</div>
                @error('password') <p class="text-danger">{{ $message }}</p> @enderror
            </div>
            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="signUpPassword" class="form-label">Confirm Password</label>
                <input type="password" id="signUpPassword" class="form-control" name="password_confirmation" placeholder="**************" required />
                <div class="invalid-feedback">Password mismatch.</div>
                @error('password_confirmation') <p class="text-danger">{{ $message }}</p> @enderror
            </div>

            <button type="submit">Verify</button>
            <br>
            <br>
            <!-- <p class="text-center"><a href="{{url('resend_verify_otp')}}">Resend OTP</a></p> -->
        </form>
    </div>
    <script src="../assets/libs/%40popperjs/core/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

    <!-- Theme JS -->
    <script src="../assets/js/theme.min.js"></script>

    <script src="../assets/js/vendors/validation.js"></script>
</body>

</html>