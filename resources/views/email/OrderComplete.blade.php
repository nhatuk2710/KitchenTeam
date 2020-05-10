@component('mail::message')
# Order Complete

Order Complete

@component('mail::button', ['url' => \Illuminate\Support\Facades\URL::signedRoute("feedback",['id'=>$order->id])])
Rate
@endcomponent

Thanks,<br>
KitchenTeam
@endcomponent
