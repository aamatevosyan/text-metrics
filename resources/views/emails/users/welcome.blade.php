@component('mail::message')
# Hello, {{ $name }}

Welcome to TextMetrics.\
Use following password to login: **{{ $password }}**

@component('mail::button', ['url' => $url])
Open TextMetrics
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
