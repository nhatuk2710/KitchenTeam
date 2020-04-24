@extends('admin.layout')
@section('home')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Product</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                  </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Category <small>sub title</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                                            class="fa fa-wrench"></i></a>
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
                            <form class="" action="{{url("admin/product/productpost",['id'=>$product->id])}}" method="post" novalidate>
                                @csrf
                                <p>For alternative validation library <code>parsleyJS</code> check out in the <a
                                        href="#">form page</a>
                                </p>
                                <span class="section">Product Info</span>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Name<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("product_name"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="product_name"
                                               placeholder="Product Name" value="{{$product->product_name}}" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Desc<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("product_desc"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="product_desc"
                                               placeholder="" value="{{$product->product_desc}}" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Price<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("price"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="price"
                                               placeholder="" value="{{$product->price}}" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Quantity<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("quantity"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="quantity"
                                               placeholder="" value="{{$product->quantity}}" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Brand id<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @if($errors->has("brand_id"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2" name="brand_id" placeholder="" value="{{old("brand_id")}}" type="number" required="required">
                                            @foreach($brand as $b)
                                                <option value="{{$b->id}}">{{$b->brand_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Cate id<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <select class="form-control @if($errors->has("category_id"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2" name="category_id" placeholder="" value="{{old("category_id")}}" type="number" required="required">
                                            @foreach($category as $b)
                                                <option value="{{$b->id}}">{{$b->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Thumbnail<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("thumbnail"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="thumbnail"
                                               placeholder="" value="{{$product->thumbnail}}" required="required" />
                                    </div>
                                </div>
                                <div class="field item form-group">
                                    <label class="col-form-label col-md-3 col-sm-3  label-align">Gallery<span
                                            class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6">
                                        <input class="form-control @if($errors->has("gallery"))is-invalid @endif" data-validate-length-range="6" data-validate-words="2"
                                               name="gallery"
                                               placeholder="" value="{{$product->gallery}}" required="required" />
                                    </div>
                                </div>
                                @if($errors->has("product_name") ||("product_desc") ||("thumbnail") ||("gallery") ||("price")
                                            ||("quantity") ||("brand_id") ||("category_id"))
                                    <p style="color:red">{{$errors->first("product_name")}}</p>
                                    <p style="color:red">{{$errors->first("product_desc")}}</p>
                                    <p style="color:red">{{$errors->first("thumbnail")}}</p>
                                    <p style="color:red">{{$errors->first("gallery")}}</p>
                                    <p style="color:red">{{$errors->first("price")}}</p>
                                    <p style="color:red">{{$errors->first("quantity")}}</p>
                                    <p style="color:red">{{$errors->first("brand_id")}}</p>
                                    <p style="color:red">{{$errors->first("category_id")}}</p>
                                @endif
                                <div class="ln_solid">
                                    <div class="form-group">
                                        <div class="col-md-6 offset-md-3">
                                            <button type='submit' class="btn btn-primary">Submit</button>
                                            <button type='submit' class="btn btn-success">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // initialize a validator instance from the "FormValidator" constructor.
        // A "<form>" element is optionally passed as an argument, but is not a must
        var validator = new FormValidator({ "events": ['blur', 'input', 'change'] }, document.forms[0]);
        // on form "submit" event
        document.forms[0].onsubmit = function (e) {
            var submit = true,
                validatorResult = validator.checkAll(this);
            console.log(validatorResult);
            return !!validatorResult.valid;
        };
        // on form "reset" event
        document.forms[0].onreset = function (e) {
            validator.reset();
        };
        // stuff related ONLY for this demo page:
        $('.toggleValidationTooltips').change(function () {
            validator.settings.alerts = !this.checked;
            if (this.checked)
                $('form .alert').remove();
        }).prop('checked', false);
    </script>
@endsection
