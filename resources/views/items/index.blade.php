@extends('layouts.app')

@section('title', 'Items')

@section('content')

<div class="mt-4">
    @forelse ($items as $item)
        <div class="py-4 leading-normal">
            <a href="{{ route('items.show', ['id' => $item->id]) }}">
                <div class="w-full h-40 bg-gray-300"></div>
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

                <div class="pl-4">$49</div>
            </div>
        </div>
    @empty
        <p>No items available</p>
    @endforelse
</div>

@endsection
