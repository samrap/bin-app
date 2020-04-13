@extends('layouts.app')

@section('title', $item->name)

@section('content')

<a href="/bin" class="block py-4 text-xs uppercase">
    @icon('arrow-thin-left', 'w-4 h-2') All items
</a>

<header>
    <h1 class="mt-10 mb-6 text-2xl font-bold leading-normal uppercase">
        {{ $item->name }}
    </h1>

    @if ($item->hasBeenClaimed())
        <p>Unavailable -- <br />This item has already been claimed</p>
    @else
        <claim-item-component action="{{ route('claim-item', ['id' => $item->id]) }}">
            @csrf
        </claim-item-component>
    @endif
</header>

<section>
    <p class="mt-12 leading-normal">Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam voluptate eius fugit iusto culpa et ducimus suscipit dignissimos nam ex nesciunt, vitae perferendis totam molestiae! Nesciunt, ratione consectetur! Officiis, quidem!</p>
    @forelse ($item->images as $image)
        <img src="{{ $image->url }}" class="my-4" alt="Item image">
    @empty
        <p class="mt-12 text-sm">No images are available for this item</p>
    @endforelse

    <a href="#" class="block mt-6 py-4 text-center text-xs uppercase">Back to top @icon('arrow-thin-up', 'w-4 h-2')</a>
</section>

@endsection
