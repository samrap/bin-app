@component('mail::message')
# Your item has been claimed from the bin

<p>This email is to confirm your claim for <a href="{{ route('items.show', ['id' => $item->id]) }}">{{ $item->name }}.</p>

<p>Keep an eye out for a follow up email with shipping and payment information.</p>

Thanks,<br>
Sam
@endcomponent
