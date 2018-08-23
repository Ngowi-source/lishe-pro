

Hello <b>{{ $user->firstname }}</b>,<br />

You have recently created an account with <i>Lishe Pro</i>, please click on the link below to verify your account.<br />

<a href="https://lishe-pro.herokuapp.com/verify/{{ base64_encode($user->id) }}">Verify Account</a><br /><br />

If you were not involved in this event please ignore this email. Do not reply to this email as messages are automatically
sent.<br />

Regards,
Lishe Pro Team.

