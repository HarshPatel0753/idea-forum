<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div>dashboard page</div>
    @guest
        <a href="{{ route('show.login') }}" class="btn btn-primary">Login</a>
        <a href="{{ route('show.registration') }}" class="btn btn-primary">Registration</a>
    @endguest

    @auth
    <form method="POST" action="{{ route('logout') }}" class="mt-3">
        @csrf
        <button type="submit" class="btn btn-primary">logout</button>
    </form>
        <label>
            Logged In user - {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
        </label>
    @endauth

</body>
</html>
