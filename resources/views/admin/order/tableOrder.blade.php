@extends('admin.layout')
@section('home')
    <body class="nav-md">
    <div class="container body">
        <div class="main_container">

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Order detail <small>Order design</small></h3>
                        </div>
                        <form method="get" action="{{url("/admin/order/searchOrder")}}">
                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">

                                    <input type="text" name="telephone" class="form-control" placeholder="Search for telephone">
                                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="submit">Go!</button>
                    </span>

                                </div>
                            </div>
                        </div>
                        </form>
                    </div>

                    <div class="clearfix"></div>
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-pending-tab" data-toggle="tab" href="#nav-pending" role="tab" aria-controls="nav-pending" aria-selected="true">Pending</a>
                            <a class="nav-item nav-link" id="nav-process-tab" data-toggle="tab" href="#nav-process" role="tab" aria-controls="nav-process" aria-selected="false">Process</a>
                            <a class="nav-item nav-link" id="nav-shipping-tab" data-toggle="tab" href="#nav-shipping" role="tab" aria-controls="nav-shipping" aria-selected="false">Shipping</a>
                            <a class="nav-item nav-link" id="nav-complete-tab" data-toggle="tab" href="#nav-complete" role="tab" aria-controls="nav-complete" aria-selected="false">Complete</a>
                            <a class="nav-item nav-link" id="nav-cancel-tab" data-toggle="tab" href="#nav-cancel" role="tab" aria-controls="nav-cancel" aria-selected="false">Cancel</a>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-pending" role="tabpanel" aria-labelledby="nav-pending-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Orders Pending</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <p>Simple table with project listing with progress and editing options</p>

                                            <!-- start project list -->
                                            <table class="table table-striped projects">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%">ID</th>
                                                    <th>Customer</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Payment method</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                    <th style="width: 20%">#Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orderPending as $p)
                                                    @php $user = \App\User::find($p->user_id) @endphp
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>
                                                            <a>{{$p->customer_name}}</a>
                                                            <br />
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a>{{$p->telephone}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="project_progress">
                                                            <a>{{$p->shipping_address}}</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->payment_method}}</a>
                                                        </td>
                                                        <td>
                                                                <a>Pending</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->id}}</a>
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{url("admin/order/editOrder/{$p->id}")}}" class="changeStatus" >
                                                                @csrf
                                                                <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Process</button>
                                                                <input name="status" value="1" hidden>
                                                                    <a onclick="return confirm('Are you sure?')" href="{{url("admin/order/cancelOrder/{$p->id}")}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Cancel</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Orders Pending</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <!-- end project list -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-process" role="tabpanel" aria-labelledby="nav-process-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Orders Process</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <p>Simple table with project listing with progress and editing options</p>

                                            <!-- start project list -->
                                            <table class="table table-striped projects">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%">ID</th>
                                                    <th>Customer name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Payment method</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                    <th style="width: 20%">#Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orderProcess as $p)
                                                    @php $user = \App\User::find($p->user_id) @endphp
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>
                                                            <a>{{$p->customer_name}}</a>
                                                            <br />
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a>{{$p->telephone}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="project_progress">
                                                            <a>{{$p->shipping_address}}</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->payment_method}}</a>
                                                        </td>
                                                        <td>
                                                                <a>Process</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->created_at}}</a>
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{url("admin/order/editOrder/{$p->id}")}}" id="changeStatus1">
                                                                @csrf
                                                                <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Shipping</button>
                                                                <input name="status" value="2" hidden>
                                                                <a onclick="return confirm('Are you sure?')" href="{{url("admin/order/cancelOrder/{$p->id}")}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Cancel</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Orders Process</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <!-- end project list -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-shipping" role="tabpanel" aria-labelledby="nav-shipping-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Orders Shipping</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <p>Simple table with project listing with progress and editing options</p>

                                            <!-- start project list -->
                                            <table class="table table-striped projects">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%">ID</th>
                                                    <th>Customer name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Payment method</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                    <th style="width: 20%">#Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orderShipping as $p)
                                                    @php $user = \App\User::find($p->user_id) @endphp
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>
                                                            <a>{{$p->customer_name}}</a>
                                                            <a>{{$user->email}}</a>
                                                            <br />
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a>{{$p->telephone}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="project_progress">
                                                            <a>{{$p->shipping_address}}</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->payment_method}}</a>
                                                        </td>
                                                        <td>
                                                                <a>Shipping</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->created_at}}</a>
                                                        </td>
                                                        <td>
                                                            <form method="post" action="{{url("admin/order/editOrder/{$p->id}")}}" class="changeStatus2">
                                                                @csrf
                                                                <button  class="btn btn-xs btn-primary"><i class="fa fa-pencil"></i>Complete</button>
                                                                <input name="status" value="3" hidden>
                                                                <a onclick="return confirm('Are you sure?')" href="{{url("admin/order/cancelOrder/{$p->id}")}}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o"></i> Cancel</a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Orders Shipping</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <!-- end project list -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-complete" role="tabpanel" aria-labelledby="nav-complete-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Orders Complete</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <p>Simple table with project listing with progress and editing options</p>

                                            <!-- start project list -->
                                            <table class="table table-striped projects">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%">ID</th>
                                                    <th>Customer name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Payment method</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orderComplete as $p)
                                                    @php $user = \App\User::find($p->user_id) @endphp
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>
                                                            <a>{{$p->customer_name}}</a>
                                                            <br />
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a>{{$p->telephone}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="project_progress">
                                                            <a>{{$p->shipping_address}}</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->payment_method}}</a>
                                                        </td>
                                                        <td>
                                                                <a>Complete</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->created_at}}</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Orders Complete</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <!-- end project list -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-cancel" role="tabpanel" aria-labelledby="nav-cancel-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="x_panel">
                                        <div class="x_title">
                                            <h2>Orders Cancel</h2>
                                            <ul class="nav navbar-right panel_toolbox">
                                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                                </li>
                                                <li class="dropdown">
                                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="#">Settings 1</a>
                                                        <a class="dropdown-item" href="#">Settings 2</a>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="x_content">

                                            <p>Simple table with project listing with progress and editing options</p>

                                            <!-- start project list -->
                                            <table class="table table-striped projects">
                                                <thead>
                                                <tr>
                                                    <th style="width: 1%">ID</th>
                                                    <th>Customer name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Address</th>
                                                    <th>Payment method</th>
                                                    <th>Status</th>
                                                    <th>Created_at</th>

                                                </tr>
                                                </thead>
                                                <tbody>
                                                @forelse($orderCancel as $p)
                                                    @php $user = \App\User::find($p->user_id) @endphp
                                                    <tr>
                                                        <td>{{$p->id}}</td>
                                                        <td>
                                                            <a>{{$p->customer_name}}</a>
                                                            <br />
                                                        </td>
                                                        <td>{{$user->email}}</td>
                                                        <td>
                                                            <ul class="list-inline">
                                                                <li>
                                                                    <a>{{$p->telephone}}</a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                        <td class="project_progress">
                                                            <a>{{$p->shipping_address}}</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->payment_method}}</a>
                                                        </td>
                                                        <td>
                                                                <a>Cancel</a>
                                                        </td>
                                                        <td>
                                                            <a>{{$p->created_at}}</a>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <p>No Orders Cancel</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            <!-- end project list -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            <!-- /footer content -->
        </div>
    </div>
    @endsection

