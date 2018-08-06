<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

Hello <b>{{ $user->firstname }}</b>,

You have recently created an account with Lishe Pro, please click on the link below to verify your account.

<a href="https://lishe-pro.herokuapp.com/verify/{{ base64_encode($user->id) }}">Verify Account</a>

If you were not involved in this event please ignore this email. Do not reply to this email as messages are automatically
sent.

Regards,
Lishe Pro Team.

</body>
</html>
