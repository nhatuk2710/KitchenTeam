@extends('layout')
@section('all')
{{--    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">--}}
{{--    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>--}}
{{--    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>--}}
    <!------ Include the above in your HEAD tag ---------->
    <style>
        .widget .panel-body { padding:0px; }
        .widget .list-group { margin-bottom: 0; }
        .widget .panel-title { display:inline }
        .widget .label-info { float: right; }
        .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
        .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
        .widget .mic-info { color: #666666;font-size: 11px; }
        .widget .action { margin-top:5px; }
        .widget .comment-text { font-size: 12px; }
        .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
    </style>
    <div class="bread-crumb bgwhite flex-w p-l-52 p-r-15 p-t-30 p-l-15-sm">
        <a href="{{url("/")}}" class="s-text16">
            Home
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <a href="{{url("listingCate/{$category->id}")}}" class="s-text16">
            {{$category->category_name}}
            <i class="fa fa-angle-right m-l-8 m-r-9" aria-hidden="true"></i>
        </a>

        <span class="s-text17">
			{{$product->product_name}}
		</span>
    </div>
    <form action="{{url("/shopping/{$product->id}")}}" method="post">
        @csrf
    <!-- Product Detail -->
    <div class="container bgwhite p-t-35 p-b-80">
        <div class="flex-w flex-sb">
            <div class="w-size13 p-t-30 respon5">
                <div class="wrap-slick3 flex-sb flex-w">
                    <div class="wrap-slick3-dots"></div>
                <?php   $img =explode(",",$product->gallery) ?>

                    <div class="slick3">
                        @foreach($img as $i)
                        <div class="item-slick3" data-thumb={{asset($i)}}>
                            <div class="wrap-pic-w">
                                <img src={{asset($i)}} alt="IMG-PRODUCT">
                            </div>
                        </div>
                            @endforeach
                    </div>
                </div>
            </div>

            <div class="w-size14 p-t-30 respon5">
                <h4 class="product-detail-name m-text16 p-b-13">
                    {{$product->product_name}}
                </h4>

                <span class="m-text17">
					${{$product->getPrice()}}
				</span>


                <p class="s-text8 p-t-10">
                    @if($product->quantity==0)
                        Quantity : Out of stock
                   @elseif($product->quantity>0 && $product->quantity<=10)
                        Quantity : Only {{$product->quantity}} left
                    @elseif($product->quantity>10)
                        Quantity :{{$product->quantity}}
                    @endif
                </p>

                <!--  -->
                <div class="p-t-33 p-b-60">
                    <div class="flex-r-m flex-w p-t-10">
                        <div class="w-size16 flex-m flex-w">
                            <div class="flex-w bo5 of-hidden m-r-22 m-t-10 m-b-10">
                                <button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                                </button>

                                <input class="size8 m-text18 t-center num-product" type="number" name="qty" value="1">

                                <button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
                                    <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>

                            <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                                <!-- Button -->
                                @if(!\Illuminate\Support\Facades\Auth::check())
                                    <a href="#" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4" data-toggle="modal" data-target="#myModal">Add to Cart </a>
                                        @else
                                <button type="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                                    Add to Cart
                                </button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div  style="color: rgb(252, 215, 3);">
                <i class="fa fa-star"></i>
                    <i class="fa fa-star-half-full"></i>
                </div>

                <!--  -->
                <div class="wrap-dropdown-content bo6 p-t-15 p-b-14 active-dropdown-content">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Description
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Additional information
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>
                </div>

                <div class="wrap-dropdown-content bo7 p-t-15 p-b-14">
                    <h5 class="js-toggle-dropdown-content flex-sb-m cs-pointer m-text19 color0-hov trans-0-4">
                        Reviews (0)
                        <i class="down-mark fs-12 color1 fa fa-minus dis-none" aria-hidden="true"></i>
                        <i class="up-mark fs-12 color1 fa fa-plus" aria-hidden="true"></i>
                    </h5>

                    <div class="dropdown-content dis-none p-t-15 p-b-23">
                        <p class="s-text8">
                            Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </form>
    @php $comment = \App\Comment::where('product_id',$product->id)->get()  @endphp
    <div class="container">
            <div class="panel panel-default widget">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span>
                <h3 class="panel-title">
                    Recent Comments</h3>
                <span class="label label-info">
                    {{count($comment)}}</span>
            </div>
                    <div class="panel-body">
                        <ul class="list-group">

                            @forelse($comment as $c)
                                @php $user = \App\User::find($c->user_id) @endphp
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-2 col-md-1">
                                        @if(!isset($user->avt))
                                        <img src="http://placehold.it/80" class="img-circle img-responsive" alt="" /></div>
                                    @else
                                        <img src="{{asset($user->avt)}}" class="img-circle img-responsive" alt="" /></div>
                                @endif
                                    <div class="col-xs-10 col-md-11">
                                        <div>
                                            <div class="mic-info">
                                                <a href="#">{{$user->name}}</a> on {{date_format($user->created_at,"d M Y")}}

                                            </div>
                                            <div class="comment-text">
                                                <p> {{$c->message}} </p>
                                            </div>
                                        </div>
                                    </div>
                            </li>
                            @empty
                                No comment
                            @endforelse
                        </ul>
                        <a href="#" class="btn btn-primary btn-sm btn-block" role="button"> KitchenTeam Project html</a>
                    </div>
            </div>
    </div>
    @if(Auth::check())
    <div class="form-control-feedback wrap-dropdown-content bo7 p-t-15 p-b-14">
        <div class="form-control-feedback">
            <div class="avt">
                <div class="container">
                    <form action="#" method="post" class="leave-comment">
                        @csrf
                        <h4 class="m-text25 p-b-14">
                            Leave a Comment
                        </h4>
                        <div class="form-group">
                            <textarea class="form-control col-md-6 col-sx-12" name="comment" id="exampleFormControlTextarea1" rows="5"></textarea>
                        </div>
                        <br/>
                        <input name ="product_id" hidden value="{{$product->id}}">


                        <div class="w-size24">
                            <!-- Button -->
                            <button type="button" id="pComment" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                Post Comment
                            </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
        @endif


    <!-- Relate Product -->
    <section class="relateproduct bgwhite p-t-45 p-b-138">
        <div class="container">
            <div class="sec-title p-b-60">
                <h3 class="m-text5 t-center">
                    Related Products
                </h3>
            </div>

            <!-- Slide2 -->
            <div class="wrap-slick2">
                <div class="slick2">
                    @foreach($category_product as $p )
                    <div class="item-slick2 p-l-15 p-r-15">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src={{asset($p->thumbnail)}} alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>

                                    <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                        <a href="{{url("/shopping/{$p->id}")}}" class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
                                            Add to Cart
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{{url("product/$p->id")}}" class="block2-name dis-block s-text3 p-b-5">
                                    {{$p->product_name}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
									${{$p->getPrice()}}
								</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        $("#pComment").bind("click",function () {
            $.ajax({
                url: "{{url("comment")}}",
                method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
                   message : $("textarea[name=comment]").val(),
                    product_id: $("input[name=product_id]").val(),
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
