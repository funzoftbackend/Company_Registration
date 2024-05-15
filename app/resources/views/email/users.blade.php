<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Account Details</title>
</head>
<body>
    <h1>Hi, {{ $email }}</h1>
    <p>Your account has been created successfully.</p>
    <p>Email: {{ $email }}</p>
    <p>Password: {{ $password }}</p>
    <p>Please log in using the following URL: <a href="{{ $url }}">{{ $url }}</a></p>
    <p>Thank you for using our application!</p>
</body>
</html>
