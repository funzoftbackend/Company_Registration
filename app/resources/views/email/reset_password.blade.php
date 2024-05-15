<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Verification Code</title>
</head>
<body>
    <img class="brand-img mr-5" width="79px" height="54px" src="{{ asset('/public/img/logo.png') }}"
                        alt="brand" />
    <h1>Hi, {{ $email }}</h1>
    <p>Your Reset Password Verification Code is</p>
    <p>{{ $code }}</p>
    <p>You can Verify this code using the following URL: <a href="{{ $url }}">{{ $url }}</a></p>
    <p>Thank you for using our application!</p>
</body>
</html>
