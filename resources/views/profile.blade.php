<!doctype html>

<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @includeIf('html.head')
    <link rel="stylesheet" href={{asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css")}}>
        <script src={{asset("https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js")}}></script>
        <script src={{asset("https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js")}}></script>
{{--    <link href={{asset("//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css")}} rel="stylesheet" id="bootstrap-css">--}}
        <script src={{asset("//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js")}}></script>
        <script src={{asset("//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js")}}></script>
<!------ Include the above in your HEAD tag ---------->

    <link href={{asset("//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css")}} rel="stylesheet" id="bootstrap-css">
        <script src={{asset("//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js")}}></script>
        <script src={{asset("//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js")}}></script>
</head>
<body>
<style>
    body{
        font-size: medium;
    }

    input{
        font-size: medium;
    }
</style>

<!-- top noti -->
{{--<div class="flex-c-m size22 bg0 s-text21 pos-relative">--}}
{{--    20% off everything!--}}
{{--    <a href="{{url("/")}}" class="s-text22 hov6 p-l-5">--}}
{{--        Shop Now--}}
{{--    </a>--}}

{{--    <button class="flex-c-m pos2 size23 colorwhite eff3 trans-0-4 btn-romove-top-noti">--}}
{{--        <i class="fa fa-remove fs-13" aria-hidden="true"></i>--}}
{{--    </button>--}}
{{--</div>--}}
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(images/heading-pages-02.jpg);">
    <h2 class="l-text2 t-center">
    </h2>
    <p class="m-text13 t-center">

    </p>
</section>
<div class="row">
    <div class="col-sm-12 col-lg-12 col-md-12 text-center" style="margin: 5% 0% 3%" ><h1 style="font-size: xx-large">Your Profile</h1></div>
    {{--        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>--}}
</div>
<div class="container bootstrap snippet">
    <div class="row">
        <div class="col-sm-10"><h1>{{$user  ->name}}</h1></div>
{{--        <div class="col-sm-2"><a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="http://www.gravatar.com/avatar/28fd20ccec6865e2d5f0e1f4446eb7bf?s=100"></a></div>--}}
    </div>
    <div class="row">
        <div class="col-sm-3"><!--left col-->
            <form action="{{url("/upAvt")}}" class="md-form" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($user->avt))
                <img style="margin-left: 0%" src="{{asset($user->avt)}}" class="rounded-circle img-thumbnail text-center" alt="avatar">
                @else
                    <img style="margin-left: 13%" src="{{asset("http://ssl.gstatic.com/accounts/ui/avatar_2x.png")}}" class="text-center rounded-circle img-thumbnail" alt="avatar">
                    @endif
                <!-- COMPONENT START -->
                <div class="form-group" style="margin-top: 5%">
                    <div class="input-group input-file" name="Fichier1">
                        <input style="font-size: small" type="file" id="file" name="avt" value="{{$user->avt}}" class="form-control" placeholder='Choose a file...' />
                        <span class="input-group-btn"></span>
                    </div>
                    @if(isset($user->avt))
                    <div class="form-group">
                        <button type="submit" style="font-size: medium" class="btn btn-danger pull-right" >Reset</button>
                    </div>
                        @else
                        <div class="form-group" >
                            <button  type="submit" style="font-size: medium" class="btn btn-primary pull-right" >Submit</button>
                        </div>
                    @endif
                </div>
                <!-- COMPONENT END -->
            <br/>
            <br>
            </form>
            <div class="panel panel-default">
                <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
                <div class="panel-body"><a href="{{url("/")}}">ShoppingRunner.com</a></div>
            </div>

            <ul class="list-group">
                <li class="list-group-item text-muted">Activity of Trade <i class="fa fa-dashboard fa-1x"></i></li>
{{--                @php $countOrder = session()->get("profile") @endphp--}}
                @if(isset($countPend) || ($countPro) || ($countShip) || ($countCom) || ($countCan))
                <li class="list-group-item text-right"><span class="pull-left"><strong>Pending</strong></span>{{$countPend}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Processing</strong></span>{{$countPro}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Shipping</strong></span>{{$countShip}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Completing</strong></span>{{$countCom}}</li>
                <li class="list-group-item text-right"><span class="pull-left"><strong>Cancelling</strong></span>{{$countCan}}</li>
                @else
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Pending</strong></span>0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Processing</strong></span>0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shipping</strong></span>0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Completting</strong></span>0</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Canceling</strong></span>0</li>
                @endif
            </ul>

            <div class="panel panel-default">
                <div class="panel-heading"><a href="{{url("oldBill")}}">View Order</a></div>
                <div class="panel-body">
                    <i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
                </div>
            </div>

        </div><!--/col-3-->
        <div class="col-sm-9">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
            </ul>


            <div class="tab-content">
                <div class="tab-pane active" id="home">
                    <hr>
                    <form class="form" action="{{url("/upProfile")}}" method="post" enctype="multipart/form-data" id="registrationForm">
                        @csrf
                        <div class="form-group">

                            <div class="col-xs-12 col-md-12">
                                <label for="first_name"><h4>First name</h4></label>
                                <input type="text" class="form-control" style="font-size: large" name="name" id="first_name" placeholder="Your Name" value="{{$user->name}}" title="enter your first name if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6 col-md-6">
                                <label for="phone"><h4>Phone</h4></label>
                                <input type="number" class="form-control" style="font-size: large" name="phone" value="{{$user->phone}}" id="phone" placeholder="enter phone" title="enter your phone number if any.">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6 col-md-6">
                                <label for="email"><h4>Address</h4></label>
                                <input type="text" class="form-control" style="font-size: large" value="{{$user->address}}" name="address" id="location" placeholder="somewhere" title="enter a location">
                            </div>
                        </div>

                        <div class="form-group">

                            <div class="col-xs-6 col-md-6">
                                <label for="email"><h4>Email</h4></label>
                                <input type="email" class="form-control" style="font-size: large" name="email" value="{{$user->email}}" id="email" placeholder="you@email.com" title="enter your email.">
                            </div>
                        </div>

{{--                        <div class="form-group">--}}

{{--                            <div class="col-xs-6 col-md-6">--}}
{{--                                <label for="password"><h4>Password</h4></label>--}}
{{--                                <input type="password" class="form-control" style="font-size: large" name="password" id="password" placeholder="password" title="enter your password.">--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="form-group">
                            <div class="col-xs-12">
                                <br>
                                <button class="btn btn-lg btn-success" style="font-size: large" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                <a class="btn btn-lg btn-primary pull-right" style="font-size: large" href="{{asset("/logout")}}" type="reset"><i class="glyphicon glyphicon-repeat"></i> Log out</a>
                            </div>
                        </div>
                    </form>
                </div><!--/tab-pane-->
            </div><!--/tab-pane-->
        </div><!--/tab-content-->

    </div><!--/col-9-->
</div><!--/row-->
{{--<script type="text/javascript">--}}
{{--    $(document).ready(function() {--}}
{{--        var readURL = function(input) {--}}
{{--            if (input.files && input.files[0]) {--}}
{{--                var reader = new FileReader();--}}

{{--                reader.onload = function (e) {--}}
{{--                    $('.avatar').attr('src', e.target.result);--}}
{{--                }--}}

{{--                reader.readAsDataURL(input.files[0]);--}}
{{--            }--}}
{{--        }--}}


{{--        $(".file-upload").on('change', function(){--}}
{{--            readURL(this);--}}
{{--        });--}}
{{--    });--}}
{{--</script>--}}
{{--    @endsection--}}
@includeIf('html.footer')
@includeIf('html.script')
</body>
</html>


