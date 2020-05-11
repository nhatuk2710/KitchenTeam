@extends('layout')
@section('all')
    <h1>{{$order->id}}</h1>
    <h2>{{$product->id}}</h2>
    <div id="review"></div>
    <section class="bgwhite p-t-60 p-b-25">
        <div class="container">

            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-50 p-r-0-lg">

                        <form action="{{url("feedback")}}" method="post" class="leave-comment">
                            @csrf
                            <h4 class="m-text25 p-b-14">
                                Leave a Comment
                            </h4>

                            <p class="s-text8 p-b-40">
                                Your email address will not be published. Required fields are marked *
                            </p>

                            <textarea class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="message" placeholder="Comment..."></textarea>

                            <div class="bo12 of-hidden size19 m-b-20">
                                <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" placeholder="Name *">
                            </div>

                            <div class="bo12 of-hidden size19 m-b-20">
                                <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="email" placeholder="Email *">
                            </div>

                            <div class="bo12 of-hidden size19 m-b-30">
                                <input class="sizefull s-text7 p-l-18 p-r-18" type="text" name="telephone" placeholder="Telephone *">
                            </div>

{{--                            <div class="bo12 of-hidden size19 m-b-30">--}}
{{--                                <select class="sizefull s-text7 p-l-18 p-r-18" name="rate">--}}
{{--                                    <option name="rate">*</option>--}}
{{--                                    <option name="rate">* *</option>--}}
{{--                                    <option name="rate">* * *</option>--}}
{{--                                    <option name="rate">* * * *</option>--}}
{{--                                    <option name="rate">* * * * *</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}

                            <div class="w-size24">
                                <!-- Button -->
                                <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Post Comment
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <script>
        $("#review").rating({
            "value": 5,
            "click": function (e) {
                console.log(e);
                $("#starsInput").val(e.stars);
            }
        });
    </script>

    @endsection
