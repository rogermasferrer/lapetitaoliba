@extends('emails.emailhtml')
@section('title', ucfirst(__('order email')))
@section('container')
<div>
	<p>Missatge enviat des de la teva web!</p>
	<p>
		Nova comanda:
	</p><p>
		Usuari: {{ $user->name }}<br />
		Email: {{ $user->email }}
	</p><p>
		Producte: {{ $product->name }}<br />
		Preu: {{ $product->price }}<br />
		Unitats: {{ $units }}
	</p><p>
		Adre&ccedil;a:<br />
		{{ $user->first_name }} {{ $user->last_name }}<br />
		{{ $user->address }}<br />
		{{ $user->town }}<br />
		{{ $user->zipcode }} {{ $user->province }}
	</p>
</div>
@endsection
