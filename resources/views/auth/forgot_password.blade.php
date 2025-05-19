<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edu Resource Recommender - Forgot password</title>
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

        input[type="email"] {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #cbd5e0;
            border-radius: 8px;
            font-size: 16px;
            background-color: #f9fafb;
            transition: border 0.3s;
        }

        input[type="email"]:focus {
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
        <h2>Reset your password</h2>

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

        <form method="POST" action="{{ url('forgot_password') }}">
            @csrf

            <div class="mb-4">
                <label for="auth_code">Enter Email</label>
                <input type="email" name="email" id="email" placeholder="e.g. you@mail.com" required>

                @error('email')
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Send Code</button>
        </form>
    </div>
</body>

</html>