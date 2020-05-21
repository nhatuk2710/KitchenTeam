@extends('layout')
@section('tittle',"Danh mục")
@section('all')
<style type="text/css">
  .hoang .active_{
        color: blue;
    }
</style>

<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-color:#9bc6cc">
    <h2 class="l-text2 t-center">
        {{$categories->category_name}}
    </h2>
    <p class="m-text13 t-center">
        New Arrivals Collection
    </p>
</section>



<!-- Content page -->
<section class="bgwhite p-t-55 p-b-65">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
                <div class="leftbar p-r-20 p-r-0-sm">
                    <!--  -->
                    <h4 class="m-text14 p-b-7">
                        Categories
                    </h4>

                    <ul class="p-b-54">
                        <li class="p-t-4">
                            <a href="#" class="s-text13 active1">
                                All
                            </a>
                        </li>
                    @foreach(\App\Category::all() as $c)
                        <li class="p-t-4">
                            <a href="{{url("listingCate/{$c->id}")}}" class="s-text13">
                               {{$c->category_name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="filter-price p-t-22 p-b-50 bo3 Th">
                        <div class="m-text15 p-b-17">
                         Brand
                        </div>
                        <ul class="p-b-54 hoang">
                            <li class="p-t-4">
                                <a href="{{request()->fullUrlWithQuery(['brand'=>'all'])}}" class="s-text13 {{Request::get('brand')=='all'?'active_':''}}">
                                    All
                                </a>
                            </li>
                            @foreach(\App\Brand::all() as $c)
                                <li class="p-t-4">
{{--                                    <a href="?brand={{$c->brand_name}}" class="s-text13">--}}
                                    <a  href="{{request()->fullUrlWithQuery(['brand'=>$c->brand_name])}}" class="{{Request::get('brand')==$c->brand_name?'active_':''}} s-text13">
                                        {{$c->brand_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="search-product pos-relative bo4 of-hidden">
                        <input class="s-text7 size6 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search Products...">

                        <button class="flex-c-m size5 ab-r-m color2 color0-hov trans-0-4">
                            <i class="fs-12 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-8 col-lg-9 p-b-50">

                    <div class="flex-sb-m flex-w p-b-35">
                         <span class="s-text8 p-t-5 p-b-5">
							Showing {{count($product)}} results
						</span>
                    <div class="flex-w">
                        <div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                            <form method="get" class="formSorting">
                            <select class="selection-2 orderBy" name="sorting">
                                <option>Default Sorting</option>
                                <option {{Request::get('sorting')=="new" ?"selected='selected'":''}} value="new">New</option>
                                <option {{Request::get('sorting')=="old" ?"selected='selected'":''}} value="old">Popularity</option>
                                <option {{Request::get('sorting')=="low" ?"selected='selected'":''}} value="low">Price: low to high</option>
                                <option {{Request::get('sorting')=="high" ?"selected='selected'":''}} value="high">Price: high to low</option>
                            </select>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Product -->
                <div class="row">
                    @foreach($product as $p)
                    <div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
                                <img src="{{asset($p->thumbnail)}}" alt="IMG-PRODUCT">

                                <div class="block2-overlay trans-0-4">
                                    <a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
                                        <i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
                                        <i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
                                    </a>
                                    @if(!$p->quantity==0)
                                        <div class="block2-btn-addcart w-size1 trans-0-4">
                                        <!-- Button -->
                                            <a class="AddtoCart flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4" href="{{url("/shopping/{$p->id}")}}">
                                                Add to Cart
                                            </a>
                                        </div>
                                    @else
                                    <div class="block2-btn-addcart out w-size1 trans-0-4">
                                        <a class="AddtoCart out flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4"  >
                                          Out of stock
                                        </a>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <div class="block2-txt p-t-20">
                                <a href="{{url("product/{$p->id}")}}" class="block2-name dis-block s-text3 p-b-5">
                                    {{$p->product_name}}
                                </a>

                                <span class="block2-price m-text6 p-r-5">
										 $ {{$p->getPrice()}}
									</span>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>

                <!-- Pagination -->
                <div class="pagination flex-m flex-w p-t-26">
                    {!! $product->links('vendor.pagination.bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Footer -->


<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection -->
<div id="dropDownSelect1"></div>
<div id="dropDownSelect2"></div>
<script>
  $(function () {
        $('.orderBy').change(function () {
            $('.formSorting').submit(
            )
        })
  })
</script>
        @endsection
