@component('mail::message')
# Hello, {{ $name }}

Your password was updated by administrator.\
Use following password to login: **{{ $password }}**

@component('mail::button', ['url' => $url])
Open TextMetrics
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
