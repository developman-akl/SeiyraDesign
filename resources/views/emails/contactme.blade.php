@component('mail::message')
# You have received a new message

_________________


- **Name**: {{ $name }}
- **Email**: {{ $email }}
- **Subject**: {{ $subject }}
- **Message**: {{ $user_message }}

_________________


Thanks,<br>
{{ config('app.name') }}
@endcomponent
