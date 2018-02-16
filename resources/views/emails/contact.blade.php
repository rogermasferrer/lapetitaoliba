@extends('emails.emailhtml')
@section('title', ucfirst(__('contact email')))
@section('container')
<div>
	<p>Missatge de test enviat des de la teva web!</p>

	{!! $messageText !!}
</div>
@endsection
