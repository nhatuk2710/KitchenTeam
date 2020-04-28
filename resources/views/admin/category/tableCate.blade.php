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
                        <h3>Projects <small>Listing design</small></h3>
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
                                <h2>Categories</h2>
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
                                        <th style="width: 20%">Category Name</th>
                                        <th>Image</th>
                                        <th>Created At</th>
                                        <th>Updated At</th>
                                        <th style="width: 20%">#Edit</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#myModal">
                                        Add +
                                    </a>
{{--                                    <a href="{{url("admin/category/cateCreate")}}" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> Add + </a>--}}
                                    @forelse($categories as $p)
                                    <tr>
                                        <td>{{$p->id}}</td>
                                        <td>
                                            <a>{{$p->category_name}}</a>
                                            <br />
                                        </td>
                                        <td>
                                            <ul class="list-inline ">
                                                <li>
                                                <img style="width: 50px; height: 50px"  src="{{asset($p->image)}}">
                                                </li>
                                            </ul>
                                        </td>
                                        <td class="project_progress">
                                            <a>{{$p->created_at}}</a>
                                        </td>
                                        <td>
                                            <a>{{$p->updated_at}}</a>
                                        </td>
                                        <td>
                                            <a href="{{url("admin/category/cateEdit",['id'=>$p->id])}}" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                            <a href="{{url("admin/category/cateDestroy",['id'=>$p->id])}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                        </td>
                                    </tr>
                                        @empty
                                        <a>No Category</a>
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
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Category</h4>
            </div>
            <form action="#" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text"  class="form-control @if($errors->has("category_name"))is-invalid @endif"  name="category_name"
                               placeholder="Category Name"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="loginBtn" type="button" class="btn btn-primary">ADD</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#loginBtn").bind("click",function () {
        $.ajax({
            url: "{{url("admin/createCategory")}}",
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                category_name: $("input[name=category_name]").val(),
            },
            success: function (res) {
                if(res.status){
                    location.reload();
                }else{
                    alert(res.message);
                }
            }
        });
    });
</script>
    @endsection
