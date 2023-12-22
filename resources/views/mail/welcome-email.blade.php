@component("mail::message")

# Welcome {{ $name }}!
Thanks for joining our listing community,
We hope you have a delightful user experience. Here are a few things to keep in mind
* We will never ask for your personal information
* lorem ipsum lorem ipsum

PLease click the button below to login into your account

@component('mail::button', ['url' => 'http://localhost:8000/login'])
Sign in
@endcomponent

@endcomponent


