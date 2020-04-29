@extends('layout')
@section('all')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset("images/cart.jpg")}});">
        <h2 class="l-text2 t-center">
            Cart
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
        <form action="{{url("/updateCart")}}" method="post">
            @csrf
        <div class="container">
            <!-- Cart item -->
            <div class="container-table-cart pos-relative">
                <div class="wrap-table-shopping-cart bgwhite">
                    <table class="table-shopping-cart">
                        <tr class="table-head">
                            <th> Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th >Quantity</th>
                            <th >Total</th>
                            <th>Delete</th>
                        </tr>
                        @forelse($cart as $p)
                        <tr class="table-row">
                            <td >
                                <div class="cart-img-product b-rad-4 o-f-hidden">
                                    <img src="{{asset($p->thumbnail)}}" alt="IMG-PRODUCT">
                                </div>
                            </td>
                            <td >$ {{$p->product_name}}</td>
                            <td >$ {{$p->getPrice()}}</td>
                            <td >
                                <div class="flex-w bo5 of-hidden w-size17">
                                    <a class=" color1 flex-c-m size7 bg8 eff2" href="{{url("reduceOne/{$p->id}")}}">
                                        <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                    </a>

                                    <input class="size8 m-text18 t-center num-product" type="number" name="qty/{{$p->id}}" value="{{$p->cart_qty}}">

                                    <a class=" color1 flex-c-m size7 bg8 eff2" href="{{url("increaseOne/{$p->id}")}}" >
                                        <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </td>
                            <td >$ {{$p->cart_qty*$p->price}}</td>
                            <td class="close-td first-row"><a class="ti-close" href="{{url("/deleteItemCart/{$p->id}")}}"></a></td>
                        </tr>
                            @empty
                            <p>Không có sản phẩm</p>
                            @endforelse
                    </table>
                </div>
            </div>

            <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->
                    <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Update Cart
                    </button>
                </div>
                <div class="size10 trans-0-4 m-t-10 m-b-10">
                    <!-- Button -->
                    <a href="{{url("/clear-cart")}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Clear Cart
                    </a>
                </div>
            </div>
            <div class="size15 trans-0-4 pull-right" style="margin-top: 2%">
                <!-- Button -->
                <a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url("check-out")}}">
                    Proceed to Checkout
                </a>
            </div>
        </div>
            <!-- Total -->
        </form>
    </section>



    @endsection
