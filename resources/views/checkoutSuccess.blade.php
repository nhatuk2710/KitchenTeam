@extends('layout')
@section('all')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset("images/cart.jpg")}});">
    </section>
    <div class="checkout-success" style="text-align: center;padding: 50px" >
        <img src="{{asset("images/success.jpg")}} " alt="" style="width: 70px;height: 70px">
        <h3>Thank you for your purchase!</h3>
        <p>We'll email you an order confirmation with details and tracking info.</p>
        <a href="{{url("/")}}"  class="btn btn-primary" > Continue Shopping</a>
    </div>
    <!-- Cart -->



@endsection
