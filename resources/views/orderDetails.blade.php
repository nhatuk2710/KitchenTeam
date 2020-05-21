@extends('layout')
@section('all')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset("images/cart.jpg")}});">
        <h2 class="l-text2 t-center">
          Order Details
        </h2>
    </section>

    <!-- Cart -->
    <section class="cart bgwhite p-t-70 p-b-100">
            <div class="container">
                <!-- Cart item -->
                <div class="container-table-cart pos-relative">
                    <div class="wrap-table-shopping-cart bgwhite">
                        <table class="table-shopping-cart">
                            <tr class="table-head">
                                <th>Order # {{$order->id}}</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th >Quantity</th>
                                <th >Total</th>
                            </tr>
                        @php $total = 0; @endphp
                            @forelse($product as $p)
                                <tr class="table-row">
                                    <td >
                                    </td>
                                    <td >{{$p->product_name}}</td>
                                    <td >$ {{$p->getPrice()}}</td>
                                    <td >{{$p->pivot->qty}}</td>
                                    <td >${{$p->pivot->qty*$p->price}}</td>
                                </tr>
                                @php $total+=($p->pivot->qty*$p->price) @endphp
                            @empty
                                <p>Không có sản phẩm</p>
                            @endforelse
                        </table>
                    </div>
                </div>

                <div class="flex-w flex-sb-m p-t-25 p-b-25 bo8 p-l-35 p-r-60 p-lr-15-sm">
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->

                    </div>
                    <div class="size10 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        @if($order->status==0)
                            <a  onclick="return checkDelete()" href="{{\Illuminate\Support\Facades\URL::signedRoute("deleteOrder",['id'=>$order->id])}}" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">  Cancel Order</a>
                            @endif
                    </div>
                </div>

                <div class="size15 trans-0-4 pull-right" style="margin-top: 2%">
                    <!-- Button -->
                    @if($order->status==3||$order->status==4)
                    <a class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url("repurchase/{$order->id}")}}">
                      Repurchased
                    </a>
                        @endif
                </div>
            </div>
    </section>



@endsection
