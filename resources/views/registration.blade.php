<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #007cc4;
            color: #fff;
        }
        .container {
            display: flex;
            width: 80%;
            max-width: 500px;
            background: #00a2ffde;
            border-radius: 10px;
            overflow: hidden;
        }
        .image-section {
            flex: 1;
            background: url('https://source.unsplash.com/500x600/?nature') center/cover;
            position: relative;
        }
        .form-section {
            flex: 1;
            padding: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-section">
            <h3 class="mb-4">Create an account</h3>
            <p>Already have an account? <a href="{{ route('show.login') }}" class="text-light">Log in</a></p>
            <form method="POST" action="{{ route('registration') }}">
                @csrf
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="First Name" name="first_name" value="{{ old('first_name') }}">
                    </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Last Name" name="last_name" value="{{ old('last_name') }}">
                    </div>
                </div>
                <div class="mt-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mt-3">
                    <input type="password" class="form-control" placeholder="Enter your password" name="password">
                </div>
                <div class="mt-3">
                    <input type="password" class="form-control" placeholder="Enter your confirm password" name="password_confirmation">
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Create account</button>
            </form>
        </div>
    </div>
    @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
        <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
        </ul>
    @endif
</body>
</html>
