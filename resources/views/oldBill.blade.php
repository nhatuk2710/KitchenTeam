@extends('layout')
@section('all')
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Pending</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Process</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Shipping</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="complete-tab" data-toggle="tab" href="#complete" role="tab" aria-controls="complete" aria-selected="false">Completting</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="cancel-tab" data-toggle="tab" href="#cancel" role="tab" aria-controls="cancel" aria-selected="false">Cancel</a>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <br/>

    <h3>Your last order</h3>
            @forelse($orderPend as $p)
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Order: {{$p->id}}</th>
                <th scope="col">Name Product</th>
                <th scope="col">Price</th>
                <th scope="col">Qty</th>
                <th scope="col">Date</th>
                <th scope="col">Total: $ {{number_format($p->grand_total,2)}}</th>
                <th><a class="btn btn-danger" href="{{url("deleteOrder",['id'=>$p->id])}}">Delete</a></th>
            </tr>
            </thead>

            @foreach($p->Products as $o)
                <tbody>
                <tr>
                    <th scope="row">{{$o->id}}</th>
                    <td>{{$o->product_name}}</td>
                    <td>${{$o->getPrice()}}</td>
                    <td>{{$o->pivot->qty}}</td>
                    <td>{{$o->created_at}}</td>
                    <td></td>
                    <td></td>
                </tr>
                </tbody>
            @endforeach
        </table>
        <br/>
    @empty
        <h3>No Order</h3>
    @endforelse
    <br/>
</div>
        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <br/>
            <h3>Your Waitting Order</h3>
            @forelse($orderPro as $p)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Order: {{$p->id}}</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total: {{number_format($p->grand_total,2)}}</th>
                    </tr>
                    </thead>
                    @foreach($p->Products as $o)
                        <tbody>
                        <tr>
                            <th scope="row">{{$o->id}}</th>
                            <td>{{$o->product_name}}</td>
                            <td>${{$o->getPrice()}}</td>
                            <td>{{$o->pivot->qty}}</td>
                            <td>{{$o->created_at}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                <br/>
            @empty
                <h3>No Order</h3>
            @endforelse
        </div>
        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
            <br/>
            <h3>Your Shipping Order</h3>
            @forelse($orderShip as $p)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Order: {{$p->id}}</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total: {{number_format($p->grand_total,2)}}</th>
                    </tr>
                    </thead>

                    @foreach($p->Products as $o)
                        <tbody>
                        <tr>
                            <th scope="row">{{$o->id}}</th>
                            <td>{{$o->product_name}}</td>
                            <td>${{$o->getPrice()}}</td>
                            <td>{{$o->pivot->qty}}</td>
                            <td>{{$o->created_at}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                <br/>
            @empty
                <h3>No Order</h3>
            @endforelse
        </div>
        <div class="tab-pane fade" id="complete" role="tabpanel" aria-labelledby="complete-tab">
            <br/>
            <h3>Your Complete Order</h3>
            @forelse($orderCom as $p)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Order: {{$p->id}}</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total: {{number_format($p->grand_total,2)}}</th>
                    </tr>
                    </thead>

                    @foreach($p->Products as $o)
                        <tbody>
                        <tr>
                            <th scope="row">{{$o->id}}</th>
                            <td>{{$o->product_name}}</td>
                            <td>${{$o->getPrice()}}</td>
                            <td>{{$o->pivot->qty}}</td>
                            <td>{{$o->created_at}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                <br/>
            @empty
                <h3>No Order</h3>
            @endforelse
        </div>
        <br/>
        <div class="tab-pane fade" id="cancel" role="tabpanel" aria-labelledby="cancel">
            <br/>
            <h3>Your Complete Order</h3>
            @forelse($orderCan as $p)
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Order: {{$p->id}}</th>
                        <th scope="col">Name Product</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total: {{number_format($p->grand_total,2)}}</th>
                    </tr>
                    </thead>

                    @foreach($p->Products as $o)
                        <tbody>
                        <tr>
                            <th scope="row">{{$o->id}}</th>
                            <td>{{$o->product_name}}</td>
                            <td>${{$o->getPrice()}}</td>
                            <td>{{$o->pivot->qty}}</td>
                            <td>{{$o->created_at}}</td>
                            <td></td>
                        </tr>
                        </tbody>
                    @endforeach
                </table>
                <br/>
            @empty
                <h3>No Order</h3>
            @endforelse
        </div>
        </div>
    </div>
    @endsection
