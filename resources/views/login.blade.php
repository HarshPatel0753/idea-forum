<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - IDEA FORUM</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .logo-container {
            display: flex;
            align-items: center;
            margin-bottom: 50px;
        }

        .logo {
            width: 50px;
            height: 50px;
            background-color: #ffc107;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
        }

        .brand-text {
            color: #0a192f;
            font-size: 28px;
            font-weight: bold;
            line-height: 1;
        }

        h1 {
            color: #0a192f;
            font-size: 36px;
            margin-bottom: 30px;
            align-self: flex-start;
            margin-left: calc(50% - 175px);
            font-weight: normal;
        }

        .form-container {
            width: 100%;
            max-width: 350px;
        }

        .form-field {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
        }

        .password-container {
            position: relative;
        }

        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #5d7285;
        }

        .eye-icon svg {
            width: 20px;
            height: 20px;
        }

        .login-btn {
            width: 100%;
            padding: 15px;
            background-color: #0a192f;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            margin-bottom: 15px;
            margin-top: 5px;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        a {
            color: #0a192f;
            text-decoration: none;
            font-size: 16px;
        }

        .error-list {
            margin-top: 15px;
            color: red;
        }
    </style>
</head>

<body>
    <div class="logo-container">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#0a192f" stroke-width="2">
                <circle cx="12" cy="12" r="5"></circle>
                <line x1="12" y1="1" x2="12" y2="3"></line>
                <line x1="12" y1="21" x2="12" y2="23"></line>
                <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
                <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
                <line x1="1" y1="12" x2="3" y2="12"></line>
                <line x1="21" y1="12" x2="23" y2="12"></line>
            </svg>
        </div>
        <div class="brand-text">
            IDEA<br>FORUM
        </div>
    </div>

    <h1>Log in</h1>

    <div class="form-container">
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <input type="text" class="form-field" placeholder="Username" name="email" value="{{ old('email') }}">

            <div class="password-container">
                <input type="password" class="form-field" placeholder="Password" name="password">
                <div class="eye-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                        <circle cx="12" cy="12" r="3"></circle>
                    </svg>
                </div>
            </div>

            <button type="submit" class="login-btn">Log in</button>
        </form>

        <div class="signup-link">
            <a href="{{ route('show.registration') }}">Don't have an account? Sign up</a>
        </div>

        @if ($errors->any())
        <ul class="error-list">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>
</body>

</html>
