@component('mail::message')
From {{$username}} - {{$fromMail}}
<h1>{{$subject}}</h1>
{!! nl2br(e($content)) !!}

@component('mail::button', ['url' => 'https://example.com'])
Click here
@endcomponent

@endcomponent