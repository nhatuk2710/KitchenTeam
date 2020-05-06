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


    <form method="post" action="{{url("check-out")}}" style="margin-right: 25%">
        @csrf
    <div class="bo9 w-size20 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto ">
        <h5 class="m-text20 p-b-24">
            Cart Total
        </h5>

            @if(isset($cart))

        <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>
            <span class="m-text21 w-size20 w-full-sm">
						${{$cart_total}}.00
					</span>
        </div>
    @endif

        <!--  -->
        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
            <div class="w-size20 w-full-sm">
                <table class="table table-borderless">
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
                            <td class="s-text19">{{$k->product_name}}</td>
                            <td class="s-text19">x{{$k->cart_qty}}</td>
                            <td class="s-text19">{{$k->price}}</td>
                        </tr>
                            @empty
                            <p>No Product</p>
                        @endforelse
                        </tbody>
                    </table>

                <span class="s-text19">
							Calculate Shipping
						</span>

                <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size10 m-t-8 m-b-12">
                    <select class="selection-1" name="payment_method">
                        <option name="payment_method">PayPal</option>
                        <option name="payment_method">Shipping Cod</option>
                        <option name="payment_method">Trading directly</option>
                    </select>
                </div>

                <div class="">
                    <label>Customer Name</label>
                    <div class="form-control ">
                        <input type="text" name="customer_name" class="form-group-sm " value="{{$k->name}}">
                    </div>
                    <br/>
                    <label>Shipping address</label>
                    <div class="form-control">
                        <input type="text" name="shipping_address" class="form-group-sm">
                    </div>
                    <br/>
                    <label>Telephone</label>
                    <div class="form-control ">
                        <input type="number" name="telephone" class="form-group-sm ">
                    </div>
                </div>
                <br/>

                <div class="size14 trans-0-4 m-b-10">
                    <!-- Button -->
                    <a href="{{url("/clear-cart")}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Cancel Bill
                    </a>
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

        <div class="size15 trans-0-4">
            <!-- Button -->
            <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Proceed to Checkout
            </button>
        </div>
    </div>

    </form>
@endsection
