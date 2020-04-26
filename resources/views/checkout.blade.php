@extends('layout')
@section('tittle',"Đặt hàng")
@section('all')
    <link rel="stylesheet" href={{asset("https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css")}} integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        .form-control btn btn-group col-lg-12{
            border-bottom: 100px;
        }
        .bo9{
            margin-top: 5%;
            margin-bottom: 5%;
        }
    </style>
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset("images/heading-pages-01.jpg")}});">
        <h2 class="l-text2 t-center">
           Check out
        </h2>
    </section>

    <!-- Cart -->
    <section class="checkout-section spad">
        <div class="container">
            <form method="post" action="{{url("check-out")}}" class="checkout-form">
                @csrf
                <div class="container" >
                    <div class="col-lg-12">
                        <div class="bo9 col-md-12 ">
                            <h5 class="m-text20 p-b-24 text-center">
                                Cart Totals
                            </h5>

                            <!--  -->
                            @if(isset($cart))
                            <div class="flex-w flex-sb-m p-b-12">

                            </div>
                            @endif

                            <!--  -->
                            <div class="">

                                <div class="">
                                    <p class="s-text8 p-b-23">

                                    </p>
                                    <span class="s-text19">
							 Shipping Detail:
						</span>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Product</th>
                                            <th scope="col">Qty</th>
                                            <th scope="col">Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($cart as $k)
                                            @php $cart_total+=($k->price*$k->cart_qty) @endphp
                                        <tr>
                                            <th scope="row">{{$k->id}}</th>
                                            <td>{{$k->product_name}}</td>
                                            <td>x{{$k->cart_qty}}</td>
                                            <td>{{$k->price}}</td>
                                        </tr>
                                            @empty
                                            <p>No Product</p>
                                        @endforelse
                                        </tbody>
                                    </table>

                                    <label>Customer Name</label>
                                    <div class="form-control col-lg-6">
                                        <input type="text" name="customer_name" class="form-group-sm col-lg-12 col-xs-12" value="{{$k->name}}">
                                    </div>
                                    <br/>
                                    <label>Shipping address</label>
                                    <div class="form-control col-md-6">
                                        <input type="text" name="shipping_address" class="form-group-sm col-lg-12 col-xs-12">
                                    </div>
                                    <br/>
                                    <label>Telephone</label>
                                    <div class="form-control col-md-6">
                                        <input type="number" name="telephone" class="form-group-sm col-lg-12 col-xs-12">
                                    </div>
                                    <br/>
                                    <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="exampleFormControlSelect1">Paymen Method</label>
                                        <select class="form-control btn-dark" name="payment_method" id="exampleFormControlSelect1">
                                            <option name="payment_method">PayPal</option>
                                            <option name="payment_method">Shipping Cod</option>
                                            <option name="payment_method">Trading directly</option>
                                        </select>
                                </div>
                                    </div>
                            </div>

                            <!--  -->
                            <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

                                <span class="m-text21 w-size20 w-full-sm">
						${{$k->cart_qty*$k->price}}.00
					</span>
                            </div>

                            <div class="size14 trans-0-4 m-b-10 pull-right ">
                                <!-- Button -->
                                <a href="{{url("/clear-cart")}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Cancel Bill
                                </a>
                            </div>

                                <button class="flex-c-m col-md-3 size15 bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Proceed to Checkout
                                </button>
                            <br/>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
