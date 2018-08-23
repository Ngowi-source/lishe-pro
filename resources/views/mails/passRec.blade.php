

Hello <b>{{ $user->firstname }}</b>,<br />

You have requested to recover your account with Lishe Pro, please click on the link below to change your password.<br /><br />

<a href="https://lishep.herokuapp.com/pass-reset/{{ base64_encode($user->id) }}">Reset Password</a><br />

If you were not involved in this event please ignore this email. Do not reply to this email as messages are automatically
sent.<br />

Regards,
Lishe Pro Team.

