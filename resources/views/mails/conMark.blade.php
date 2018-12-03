@component('mail::message')
    Hi there,<br>

    There is an enquiry from a user on Lishe Pro!

    The client's name is {{$client->name}}, whose email is given as {{$client->email}}.

    The client had the following to say:

    @component('mail::panel')
        {{$client->msg}}
    @endcomponent
    -
    Thanks,<br>

    {{ config('app.name') }}

@endcomponent

