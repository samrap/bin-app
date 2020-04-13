@extends('layouts.app')

@section('content')

<header class="mb-12">
    <h1 class="mt-10 mb-1 text-2xl font-bold leading-normal uppercase">
        Item claimed
    </h1>
    <a href="{{ route('items.show', ['id' => $item->id]) }}" class="block mb-8 uppercase text-gray-600">{{ $item->name }}</a>

    <p class="leading-normal">A confirmation email has been sent to <strong>{{ session('identity') }}</strong>. Keep an eye out for a follow-up email for payment and shipping.<br><br>You can safely close this page.</p>
</header>

@endsection
