@extends('layout')
@section('tittle',"Feedback")
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
@section('all')
    <section class="bgwhite p-t-60 p-b-25">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-9 p-b-80">
                    <div class="p-r-50 p-r-0-lg">

                        <form action="{{url("feedback")}}" method="post" class="leave-comment">
                            @csrf
                            <h4 class="m-text25 p-b-14">
                                Leave a Comment
                                {{$product->id}}
                            </h4>



                            <textarea style="padding-top: 20px" class="dis-block s-text7 size18 bo12 p-l-18 p-r-18 p-t-13 m-b-20" name="message" placeholder="Comment..."></textarea>
                                <input hidden class="sizefull s-text7 p-l-18 p-r-18" type="text" name="id" value="{{$product->id}}">
                                <input hidden class="sizefull s-text7 p-l-18 p-r-18" type="text" name="name" value="{{$order->customer_name}}">
                                <input hidden class="sizefull s-text7 p-l-18 p-r-18" type="text" name="address" value="{{$order->shipping_address}}" >
                                <input hidden class="sizefull s-text7 p-l-18 p-r-18" type="text" name="telephone" value="{{$order->telephone}}">
                            <div class=" of-hidden size19 m-b-30">
                                <p>Rate</p>
                                <h4><div id="review" ></div></h4>
                                <input hidden type="text" name="rate" readonly id="starsInput" class="form-control form-control-sm">
                            </div>

                            <div class="w-size24">
                                <!-- Button -->
                                <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                                    Feedback
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
            "value":5 ,
            "click": function (e) {
                console.log(e);
                $("#starsInput").val(e.stars);
            }
        });
    </script>

    @endsection
