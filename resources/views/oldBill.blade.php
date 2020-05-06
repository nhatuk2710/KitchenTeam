@extends('layout')
@section('all')
    <section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url({{asset("images/cart.jpg")}});">
        <h2 class="l-text2 t-center">
           Order
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
                                <th>Order #</th>
                                <th>Customer name</th>
                                <th>Shipping address</th>
                                <th >Telephone</th>
                                <th >Grand total</th>
                                <th>Payment method</th>
                                <th>Order status</th>
                                <th>Created at</th>
                            </tr>
                            @forelse($order as $p)
                                <tr class="table-row">
                                    <td >
                                    <a href="{{url("orderDetails/{$p->id}")}}"> # {{$p->id}}</a>
                                    </td>
                                    <td >{{$p->customer_name}}</td>
                                    <td >{{$p->shipping_address}}</td>
                                    <td >{{$p->telephone}}</td>
                                    <td >${{$p->grand_total}}</td>
                                    <td >{{$p->payment_method}}</td>
                                    @if($p->status==0)
                                        <td >Pending</td>
                                    @elseif($p->status==1)
                                        <td >Process</td>
                                    @elseif($p->status==2)
                                        <td >Shipping</td>
                                    @elseif($p->status==3)
                                        <td >Complete</td>
                                    @elseif($p->status==3)
                                        <td >Cancel</td>
                                        @endif
                                    <td >{{$p->created_at}}</td>
                                </tr>
                            @empty
                                <p>Không có đơn hàng</p>
                            @endforelse
                        </table>
                    </div>
                </div>
            </div>
    </section>



@endsection
