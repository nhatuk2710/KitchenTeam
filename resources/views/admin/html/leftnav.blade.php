<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{url("/admin/home")}}" class="site_title"><i class="fa fa-paw"></i> <span>Kitchen Manager!</span></a>
        </div>

        <div class="clearfix"></div>
{{--        @php $user = session('user') @endphp--}}
@if(Auth::check())
        <!-- menu profile quick info -->
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src={{asset(Auth::user()->avt)}} alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{Auth::user()->name}}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />
        @else
        <div class="profile clearfix">
            <div class="profile_pic">
                <img src={{asset("/images/img.jpg")}} alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
                <span>Welcome,</span>
                <h2></h2>
            </div>
        </div>
        <br />
    @endif
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                    <li><a href="{{url("/")}}"><i class="fa fa-home"></i> Home </a>
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="index.html">Dashboard</a></li>--}}
{{--                            <li><a href="index2.html">Dashboard2</a></li>--}}
{{--                            <li><a href="index3.html">Dashboard3</a></li>--}}
{{--                        </ul>--}}
                    </li>
{{--                    <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">General Form</a></li>--}}
{{--                            <li><a href="#">Advanced Components</a></li>--}}
{{--                            <li><a href="#">Form Validation</a></li>--}}
{{--                            <li><a href="#">Form Wizard</a></li>--}}
{{--                            <li><a href="#">Form Upload</a></li>--}}
{{--                            <li><a href="#">Form Buttons</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a><i class="fa fa-desktop"></i> UI Elements <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">General Elements</a></li>--}}
{{--                            <li><a href="#">Media Gallery</a></li>--}}
{{--                            <li><a href="#">Typography</a></li>--}}
{{--                            <li><a href="#">Icons</a></li>--}}
{{--                            <li><a href="#">Glyphicons</a></li>--}}
{{--                            <li><a href="#">Widgets</a></li>--}}
{{--                            <li><a href="#">Invoice</a></li>--}}
{{--                            <li><a href="#">Inbox</a></li>--}}
{{--                            <li><a href="#">Calendar</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                    <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
{{--                            <li><a>Table Trade<span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
                                    <li><a href="{{url("/admin/category/tableCate")}}">Category</a></li>
                                    <li><a href="{{url("/admin/brand/tableBrand")}}">Brand</a></li>
                                    <li><a href="{{url("/admin/product/tableProduct")}}">Product</a></li>
{{--                                </ul>--}}
                            <li><a href="{{url("admin/user/tableUser")}}">Table User</a></li>
                            <li><a href="{{url("admin/order/tableOrder")}}">Table Order</a></li>
                        </ul>
                    </li>
{{--                    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">Chart JS</a></li>--}}
{{--                            <li><a href="#">Chart JS2</a></li>--}}
{{--                            <li><a href="#">Moris JS</a></li>--}}
{{--                            <li><a href="#">ECharts</a></li>--}}
{{--                            <li><a href="#">Other Charts</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">Fixed Sidebar</a></li>--}}
{{--                            <li><a href="#">Fixed Footer</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
                </ul>
            </div>
{{--            <div class="menu_section">--}}
{{--                <h3>Live On</h3>--}}
{{--                <ul class="nav side-menu">--}}
{{--                    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">E-commerce</a></li>--}}
{{--                            <li><a href="#">Projects</a></li>--}}
{{--                            <li><a href="#">Project Detail</a></li>--}}
{{--                            <li><a href="#">Contacts</a></li>--}}
{{--                            <li><a href="#">Profile</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">403 Error</a></li>--}}
{{--                            <li><a href="#">404 Error</a></li>--}}
{{--                            <li><a href="#">500 Error</a></li>--}}
{{--                            <li><a href="#">Plain Page</a></li>--}}
{{--                            <li><a href="#">Login Page</a></li>--}}
{{--                            <li><a href="#">Pricing Tables</a></li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>--}}
{{--                        <ul class="nav child_menu">--}}
{{--                            <li><a href="#">Level One</a>--}}
{{--                            <li><a>Level One<span class="fa fa-chevron-down"></span></a>--}}
{{--                                <ul class="nav child_menu">--}}
{{--                                    <li class="sub_menu"><a href="#">Level Two</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Level Two</a>--}}
{{--                                    </li>--}}
{{--                                    <li><a href="#">Level Two</a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </li>--}}
{{--                            <li><a href="#">Level One</a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}

        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
{{--            <a data-toggle="tooltip" data-placement="top" title="Settings">--}}
{{--                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>--}}
{{--            </a>--}}
{{--            <a data-toggle="tooltip" data-placement="top" title="FullScreen">--}}
{{--                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>--}}
{{--            </a>--}}
{{--            <a data-toggle="tooltip" data-placement="top" title="Lock">--}}
{{--                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>--}}
{{--            </a>--}}
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{url("logout")}}">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
