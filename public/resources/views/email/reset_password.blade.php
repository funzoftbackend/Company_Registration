@component('mail::message')
# Reset Your Password

Your password reset code is: {{ $resetCode }}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
