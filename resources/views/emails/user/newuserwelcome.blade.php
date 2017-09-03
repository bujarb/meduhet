@component('mail::message')
# Miresevini ne {{$user->name}}

Faleminderit qe u bashkuat me ne.
Tani blerja dhe shitja do te behet me e lehte.

@component('mail::panel')
  The email you signed up is: {{$user->email}}
@endcomponent

@component('mail::button', ['url' => 'http://localhost:8000/'])
Shiko Profilin
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
