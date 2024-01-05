@component("mail::message")
# Account Registration for {{$email}}

Thanks for joining our Job listing platform. You are just one step away from completing your registration.
PLease click the button below to verify your account
@component("mail::button", ['url' => 'www.trial.abc'])
Verify email
@endcomponent

@endcomponent
