@extends('layouts.app')

@section('title', 'Items')

@section('content')

<section class="mt-4">
    @forelse ($items as $item)
        <div class="py-4 leading-normal">
            <a href="{{ route('items.show', ['id' => $item->id]) }}">
                <div class="w-full min-h-40 text-center bg-gray-300">
                    @if ($featured_image_url = $item->featuredImageUrl())
                        <img src="{{ $featured_image_url }}" class="block mx-auto" alt="">
                    @else
                        <div class="py-12">
                            <x-zondicon-photo class="mx-auto w-12 fill-current text-gray-600"/>
                            <p class="text-sm text-gray-700">No image available</span>
                        </div>
                    @endif
                </div>
            </a>
            <div class="flex justify-between py-4">
                <div class="max-w-xs">
                    <h3 class="font-bold uppercase hover:text-blue-600">
                        <a href="{{ route('items.show', ['id' => $item->id]) }}">
                            {{ $item->name }}
                        </a>
                    </h3>

                    <p class="mt-2 uppercase text-xs text-gray-600">
                        {{ ($item->hasBeenClaimed()) ? 'Claimed' : 'Available' }}
                    </p>
                </div>

                <div class="pl-4">
                    ${{ $item->price }}
                </div>
            </div>
        </div>
    @empty
        <p>No items available</p>
    @endforelse

    <a href="#" class="block mt-6 py-4 text-center text-xs uppercase">Back to top <x-zondicon-arrow-thin-up class="w-4 h-2"/></a>
</section>

@endsection
