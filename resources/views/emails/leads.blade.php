@component('mail::message')
# Leads Email

Test Mail {{$test}}

Thanks,<br>
{{ config('app.name') }}
@endcomponent
