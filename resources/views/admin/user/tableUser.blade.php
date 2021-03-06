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
                            <h3>Brands <small>Listing design</small></h3>
                        </div>

                        <div class="title_right">
                            <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search for...">
                                    <span class="input-group-btn">
                      <button class="btn btn-secondary" type="button">Go!</button>
                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>Users</h2>
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
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
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
                                            <th style="width: 20%">User Name</th>
                                            <th>Email</th>
                                            <th>Created At</th>
                                            <th style="width: 20%">#Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @forelse($user as $p)
                                            <tr>
                                                <td>{{$p->id}}</td>
                                                <td>
                                                    <a>{{$p->name}}
                                                    @if($p->provider=='facebook')
                                                            (Facebook)
                                                        @endif
                                                    </a>
                                                    <br />
                                                </td>
                                                <td>
                                                    <a>{{$p->email}}</a>
                                                </td>
                                                <td class="project_progress">
                                                    <a>{{$p->created_at}}</a>
                                                </td>

                                                <td>
                                                    <form action="{{url("admin/user/userEdit/{$p->id}")}}" method="post">
                                                        @csrf
                                                        <input hidden name="role" value="1">
                                                    <button type="submit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </button>
                                                    </form>
                                                    <a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <p>No User</p>
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
