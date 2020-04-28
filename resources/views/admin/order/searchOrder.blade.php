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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Orders</h2>
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
                                            <th style="width: 20%">Customer name</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Payment method</th>
                                            <th>Status</th>
                                            <th>Created_at</th>
                                            <th style="width: 20%">#Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse($search as $p)
                                            <tr>
                                                <td>{{$p->id}}</td>
                                                <td>
                                                    <a>{{$p->customer_name}}</a>
                                                    <br />
                                                </td>
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
                                                    @if($p->status == 0)
                                                        <a>Pending</a>
                                                    @elseif($p->status == 1)
                                                        <a>Process</a>
                                                    @elseif($p->status == 2)
                                                        <a>Shipping</a>
                                                    @elseif($p->status == 3)
                                                        <a>Complete</a>
                                                    @elseif($p->status == 4)
                                                        <a>Cancel</a>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a>{{$p->created_at}}</a>
                                                </td>
                                                <td>
                                                    <form method="post" action="{{url("admin/order/editOrder/{$p->id}")}}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</button>
                                                        <select name="status" class="btn btn-danger btn-xs">
                                                            <option value="0">Pending</option>
                                                            <option value="1">Process</option>
                                                            <option value="2">Shipping</option>
                                                            <option value="3">Complete</option>
                                                            <option value="4">Cancel</option>
                                                        </select>
                                                    </form>
                                                    {{--                                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>--}}
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No Order</p>
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
            <!-- /page content -->

            <!-- footer content -->
            <!-- /footer content -->
        </div>
    </div>
@endsection

