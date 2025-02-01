@component('mail::message')
# Welcome to TeamFlow

Hi {{ $name }},

You've been added to the team! Here are your login credentials:

Email: {{ $email }}
Password: {{ $password }}

Please change your password after your first login.

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

Best regards,<br>
{{ config('app.name') }} Team
@endcomponent
