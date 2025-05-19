<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edu Resource Recommender - Verify Your Account</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
            color: #2d3748;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 60px auto;
            background-color: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            text-align: center;
        }

        h1 {
            font-size: 28px;
            color: #1a202c;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 18px;
            color: #4a5568;
            margin-bottom: 25px;
        }

        .code-box {
            display: inline-block;
            background-color: #edf2f7;
            color: #1a202c;
            font-size: 26px;
            font-weight: bold;
            letter-spacing: 6px;
            padding: 14px 28px;
            border-radius: 10px;
            margin: 20px 0;
        }

        p {
            font-size: 16px;
            color: #4a5568;
            margin-bottom: 1rem;
            line-height: 1.6;
        }

        .footer {
            font-size: 13px;
            color: #a0aec0;
            margin-top: 30px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Edu Resource Recommender! 📚✨</h1>
        <h2>Your Student Resource Hub</h2>

        <p>Thank you for signing up! To keep your account secure, please verify your email using the code below:</p>

        <div class="code-box">{{ $authCode }}</div>

        <p>Enter this code on the verification screen to complete your registration and start exploring top-rated books, video tutorials, and learning resources curated just for you.</p>

        <p>If you didn't request this code, you can safely ignore this message.</p>

        <div class="footer">
            &copy; {{ date('Y') }} Edu Resource Recommender. All rights reserved.
        </div>
    </div>
</body>

</html>