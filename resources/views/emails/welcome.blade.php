<!DOCTYPE html>
<html>
<head>
    <title>Welcome to TeamFlow</title>
</head>
<body>
    <h1>Welcome to TeamFlow, {{ $user->name }}!</h1>
    <p>Your account has been successfully created.</p>
    <p>You can now start managing your projects and collaborating with your team.</p>
    <a href="{{ url('/login') }}">Login to Your Account</a>
</body>
</html>
