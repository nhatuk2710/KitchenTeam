@component('mail::message')
# OrderProcess

Order is being processed
Click the button to check the order again

@component('mail::button', ['url' => 'http://karluk.herokuapp.com/oldBill'])
  Check order
@endcomponent

Thanks,<br>
KitchenTeam
@endcomponent
