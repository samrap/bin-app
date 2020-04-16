@component('mail::message')
# An item was claimed from the bin

[{{ $item->name }}]({{ route('items.show', ['id' => $item->id]) }}) was claimed by **{{ $item->claimed_by }}**.

Don't forget to follow up with shipping and payment information.

Yours truly,<br>
You
@endcomponent
