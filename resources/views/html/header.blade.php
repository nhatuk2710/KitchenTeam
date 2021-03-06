<div class="wrap_header fixed-header2 trans-0-4">

    <a href="{{asset("/")}}" class="logo">
        <img src="{{asset("images/icons/logo.png")}}" alt="IMG-LOGO">
    </a>

    <!-- Menu -->
    <div class="wrap_menu">
        <nav class="menu">
            <ul class="main_menu">
                <li>
                    <a href="{{asset("/")}}">Home</a>
                </li>

                @foreach(\App\Category::all()->take(3) as $c)
                    <li><a href="{{url("listingCate/{$c->id}")}}">{{$c->category_name}}</a></li>
                @endforeach

            </ul>
        </nav>
    </div>

    <!-- Header Icon -->
    <div class="header-icons">

        @if(!Auth::check())
            <a href="#" class="header-wrapicon1 dis-block m-l-30" data-toggle="modal" data-target="#myModal">
                <img src="{{asset("images/icons/icon-header-01.png")}}"  class="header-icon1">
            </a>
        @else
            <a href="{{url("profile")}}" class="header-wrapicon1 dis-block m-l-30 pull-right">
                @if(isset(Auth::user()->avt))
                <img  src="{{Auth::user()->avt}}" class="header-icon1 rounded-circle ">
                    @else
                    <img  src="{{asset('images/icons/noImg.jpg')}}" class="header-icon1 rounded-circle ">
                    <a href="{{url("profile")}}">{{Auth::user()->name}}</a>
                @endif
            </a>
{{--            <div class="topbar-language rs1-select2">--}}
{{--                <select class="selection-1" href="{{url("logout")}}" name="time">--}}
{{--                    <option>{{Auth::user()->name}}</option>--}}
{{--                    <option>Profile</option>--}}
{{--                    --}}{{--                            <option>Your old order</option>--}}
{{--                    <option>Mail</option>--}}
{{--                    --}}{{--                            <div class="dropdown-divider"></div>--}}
{{--                    <option>Log out</option>--}}
{{--                </select>--}}
{{--            </div>--}}
            {{--                    <ul class="nav-item dropdow">--}}
            {{--                            <p class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
            {{--                               aria-haspopup="true"--}}
            {{--                               aria-expanded="false">{{Auth::user()->name}}</p>--}}
            {{--                        <div class="dropdown-menu ml-auto">--}}
            {{--                            <a href="#" style="margin-left: 6%">Profile</a>--}}
            {{--                            <br/>--}}
            {{--                            <a href="#" style="margin-left: 6%">Mail</a>--}}
            {{--                            <br/>--}}
            {{--                            <a href="#" style="margin-left: 6%">Your old order</a>--}}
            {{--                            <div class="dropdown-divider"></div>--}}
            {{--                            <a href="#" style="margin-left: 6%">Logout</a>--}}
            {{--                        </div>--}}
            {{--                    </ul>--}}
        @endif

        <span class="linedivide1"></span>
            @php $cart= session("cart") @endphp
            @if(isset($cart))
        <div class="header-wrapicon2">
            <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
            <span class="header-icons-noti">{{count($cart)}}</span>

            <!-- Header cart noti -->
            <div class="header-cart header-dropdown">
                <ul class="header-cart-wrapitem">
                    <?php $total=0 ?>
                    @foreach($cart as $c)
                    <li class="header-cart-item">
                        <div class="header-cart-item-img">
                            <img src="{{asset("$c->thumbnail")}}" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt">
                            <a href="#" class="header-cart-item-name">
                                {{$c->product_name}}
                            </a>
                            <?php $total+=($c->cart_qty*$c->price) ?>
                            <span class="header-cart-item-info">
									${{$c->getPrice()}} x {{$c->cart_qty}}
								</span>
                        </div>
                    </li>
                        @endforeach
                </ul>

                <div class="header-cart-total">
                    Total: ${{$total}}
                </div>

                <div class="header-cart-buttons">
                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="{{url("cart")}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            View Cart
                        </a>
                    </div>

                    <div class="header-cart-wrapbtn">
                        <!-- Button -->
                        <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
                @else
                <div class="header-wrapicon2">
                    <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                    <span class="header-icons-noti">0</span>
                </div>
        @endif
    </div>
</div>

<!-- top noti -->
{{--<div class="flex-c-m size22 bg0 s-text21 pos-relative">--}}
{{--    20% off everything!--}}
{{--    <a href="#" class="s-text22 hov6 p-l-5">--}}
{{--        Shop Now--}}
{{--    </a>--}}

{{--    <button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">--}}
{{--        <i class="fa fa-remove fs-13" aria-hidden="true"></i>--}}
{{--    </button>--}}
{{--</div>--}}

<!-- Header -->
<header class="header2">
    <!-- Header desktop -->
    <div class="container-menu-header-v2 p-t-26">
        <div class="topbar2">
            <div class="topbar-social">
                <a href="https://www.facebook.com/" class="topbar-social-item fa fa-facebook"></a>
                <a href="https://www.instagram.com/" class="topbar-social-item fa fa-instagram"></a>
                <a href="https://www.pinterest.com/" class="topbar-social-item fa fa-pinterest-p"></a>
                <a href="https://www.snapchat.com/" class="topbar-social-item fa fa-snapchat-ghost"></a>
                <a href="https://www.yotube.com/" class="topbar-social-item fa fa-youtube-play"></a>
            </div>
            <!-- Logo2 -->
            <a href="{{asset("/")}}" class="logo2">
                <img src="{{asset("images/icons/logo.png")}}" alt="IMG-LOGO">
            </a>
            @if(!Auth::check())
            <div class="topbar-child2">
					<span class="topbar-email">
					</span>
                <a href="#" class="header-wrapicon1 dis-block m-l-30" data-toggle="modal" data-target="#myModal">
                    <img src="{{asset("images/icons/icon-header-01.png")}}"  class="header-icon1" alt="ICON">
                </a>
                @else
                    <div class="topbar-child2">
                        <span class="topbar-email">
						{{Auth::user()->email}}
					</span>
                        <div class="dropdown">
                            <button class="header-wrapicon1 dis-block m-l-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(!isset(Auth::user()->avt))
                                       <img src="{{asset('images/icons/noImg.jpg')}}" class="header-icon1 rounded-circle ">

                                    @else
                                       <img src="{{asset(Auth::user()->avt)}}" class="header-icon1 rounded-circle ">

                                @endif
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{url("profile")}}">View profile</a>
                                <a class="dropdown-item" href="{{url("oldBill")}}">View Order</a>
                                <a class="dropdown-item" href="{{url("logout")}}">Logout</a>
                            </div>
                        </div>
                    <div class="topbar-language rs1-select2">
                        <a href="#">{{Auth::user()->name}}</a>
                    </div>
                @endif


                <!--  -->


                <span class="linedivide1"></span>

                @if(isset($cart))
                    <div class="header-wrapicon2">
                        <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">{{count($cart)}}</span>

                        <!-- Header cart noti -->
                        <div class="header-cart header-dropdown">
                            <ul class="header-cart-wrapitem">
                                <?php $total=0 ?>
                                @foreach($cart as $c)
                                    <li class="header-cart-item">
                                        <div class="header-cart-item-img">
                                            <img src="{{asset("$c->thumbnail")}}" alt="IMG">
                                        </div>

                                        <div class="header-cart-item-txt">
                                            <a href="#" class="header-cart-item-name">
                                                {{$c->product_name}}
                                            </a>
                                            <?php $total+=($c->cart_qty*$c->price) ?>
                                            <span class="header-cart-item-info">
									${{$c->getPrice()}} x {{$c->cart_qty}}
								</span>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="header-cart-total">
                                Total: ${{$total}}
                            </div>

                            <div class="header-cart-buttons">
                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{url("cart")}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        View Cart
                                    </a>
                                </div>

                                <div class="header-cart-wrapbtn">
                                    <!-- Button -->
                                    <a href="{{url("check-out")}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                        Check Out
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="header-wrapicon2">
                        <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                        <span class="header-icons-noti">0</span>
                    </div>
                @endif
            </div>
        </div>

        <div class="wrap_header">

            <!-- Menu -->
            <div class="wrap_menu">
                <nav class="menu">
                    <ul class="main_menu">
                        <li>
                            <a href="{{asset("/")}}">Home</a>
                        </li>
                        @foreach(\App\Category::all() as $c)
                            <li><a href="{{url("listingCate/{$c->id}")}}">{{$c->category_name}}</a></li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            <!-- Header Icon -->
            <div class="header-icons">

            </div>
        </div>
    </div>

    <!-- Header Mobile -->
    <div class="wrap_header_mobile">
        <!-- Logo moblie -->
        <a href="{{url("/")}}" class="logo-mobile">
            <img src="{{asset("images/icons/logo.png")}}" alt="IMG-LOGO">
        </a>

        <!-- Button show menu -->
        <div class="btn-show-menu">
            <!-- Header Icon mobile -->
            <div class="header-icons-mobile">
                @if(!Auth::check())
                    <div class="dropdown">
                        <button class="header-wrapicon1 dis-block m-l-30" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <a href="#" class="header-wrapicon1 dis-block m-l-30" >
                                <img src="{{asset("images/icons/icon-header-01.png")}}" class="header-icon1" alt="ICON">
                            </a>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{url("login")}}">Login</a>
                            <a class="dropdown-item" href="{{url("register")}}">Create new account</a>
                        </div>
                    </div>

                @else
                    @if(isset(Auth::user()->avt))
                    <a href="{{url("profile")}}" class="header-wrapicon1 dis-block m-l-30">
                        <img src="{{asset(Auth::user()->avt)}}" class="header-icon1 rounded-circle "  alt="ICON">
                    </a>
                @else
                        <a href="{{url("profile")}}" class="header-wrapicon1 dis-block m-l-30">
                            <img src="{{asset('images/icons/noImg.jpg')}}" class="header-icon1 rounded-circle "  alt="ICON">
                        </a>
                    @endif
                    <div class="topbar-language rs1-select2">
                        <a>{{Auth::user()->name}}</a>
                    </div>
                    {{--                    <ul class="nav-item dropdow">--}}
                    {{--                            <p class="nav-link active dropdown-toggle" data-toggle="dropdown" href="#" role="button"--}}
                    {{--                               aria-haspopup="true"--}}
                    {{--                               aria-expanded="false">{{Auth::user()->name}}</p>--}}
                    {{--                        <div class="dropdown-menu ml-auto">--}}
                    {{--                            <a href="#" style="margin-left: 6%">Profile</a>--}}
                    {{--                            <br/>--}}
                    {{--                            <a href="#" style="margin-left: 6%">Mail</a>--}}
                    {{--                            <br/>--}}
                    {{--                            <a href="#" style="margin-left: 6%">Your old order</a>--}}
                    {{--                            <div class="dropdown-divider"></div>--}}
                    {{--                            <a href="#" style="margin-left: 6%">Logout</a>--}}
                    {{--                        </div>--}}
                    {{--                    </ul>--}}
                @endif

                <span class="linedivide2"></span>
                    @if(isset($cart))
                        <div class="header-wrapicon2">
                            <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                            <span class="header-icons-noti">{{count($cart)}}</span>

                            <!-- Header cart noti -->
                            <div class="header-cart header-dropdown">
                                <ul class="header-cart-wrapitem">
                                    <?php $total=0 ?>
                                    @foreach($cart as $c)
                                        <li class="header-cart-item">
                                            <div class="header-cart-item-img">
                                                <img src="{{asset("$c->thumbnail")}}" alt="IMG">
                                            </div>

                                            <div class="header-cart-item-txt">
                                                <a href="#" class="header-cart-item-name">
                                                    {{$c->product_name}}
                                                </a>
                                                <?php $total+=($c->cart_qty*$c->price) ?>
                                                <span class="header-cart-item-info">
									${{$c->getPrice()}} x {{$c->cart_qty}}
								</span>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="header-cart-total">
                                    Total: ${{$total}}
                                </div>

                                <div class="header-cart-buttons">
                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="{{url("cart")}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            View Cart
                                        </a>
                                    </div>

                                    <div class="header-cart-wrapbtn">
                                        <!-- Button -->
                                        <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                            Check Out
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="header-wrapicon2">
                            <img src="{{asset("images/icons/icon-header-02.png")}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
                            <span class="header-icons-noti">0</span>
                        </div>
                    @endif

            </div>

            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
            </div>
        </div>
    </div>

    <!-- Menu Mobile -->
    <div class="wrap-side-menu" >
        <nav class="side-menu">
            <ul class="main-menu">
                <li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $50
						</span>
                </li>
                <li class="item-topbar-mobile p-l-10">
                    <div class="topbar-social-mobile">
                        <a href="#" class="topbar-social-item fa fa-facebook"></a>
                        <a href="#" class="topbar-social-item fa fa-instagram"></a>
                        <a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
                        <a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
                        <a href="#" class="topbar-social-item fa fa-youtube-play"></a>
                    </div>
                </li>

                <li class="item-menu-mobile">
                    <a href="{{url("/")}}">Home</a>
                </li>
                @foreach(\App\Category::all() as $c)
                <li class="item-menu-mobile">
                        <a href="{{asset("listingCate/{$c->id}")}}">{{$c->category_name}}</a>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
    </div>
</header>


