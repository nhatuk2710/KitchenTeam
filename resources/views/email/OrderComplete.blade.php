@component('mail::message')
# Order Complete

Order Complete
$order
@php $product=$order->Products; @endphp
@foreach($product as $p)
@component('mail::button', ['url' => \Illuminate\Support\Facades\URL::signedRoute("feedback",['o'=>$order,'id'=>$p->id])])
Review product : {{$p->product_name}}
@endcomponent
@endforeach
Thanks,<br>
KitchenTeam
@endcomponent
