@component('mail::message')
# Your item has been claimed from the bin

This email is to confirm your claim for {{ $item->name }}. Keep an eye out for
a follow up email with shipping and payment information.

Thanks,<br>
Sam
@endcomponent
