<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
    <div class="flex-w p-b-90">
        <div class="w-size6 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                GET IN TOUCH
            </h4>

            <div>
                <p class="s-text7 w-size27">
                    Any questions? Let us know in store at 8th floor, 379 Hudson St, New York, NY 10018 or call us on (+1) 96 716 6879
                </p>

                <div class="flex-m p-t-30">
                    <a href="https://www.facebook.com/" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
                    <a href="https://www.instagram.com/" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
                    <a href="https://www.pinterest.com/" class="fs-18 color1 p-r-20 fa fa-pinterest-p"></a>
                    <a href="https://www.snapchat.com/" class="fs-18 color1 p-r-20 fa fa-snapchat-ghost"></a>
                    <a href="https://www.yotube.com/" class="fs-18 color1 p-r-20 fa fa-youtube-play"></a>
                </div>
            </div>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Categories
            </h4>
            <?php $cate =\App\Category::all() ?>
            <ul>
                @foreach($cate as $c)
                <li class="p-b-9">
                    <a href="{{url("listingCate/{$c->id}")}}" class="s-text7">
                        {{$c->category_name}}
                    </a>
                </li>
                    @endforeach
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Brand
            </h4>
            <?php $brand =\App\Brand::all() ?>
            <ul>
                @foreach($brand as $c)
                    <li class="p-b-9">
                        <a href="{{url("listingBrand/{$c->id}")}}" class="s-text7">
                            {{$c->brand_name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
            <h4 class="s-text12 p-b-30">
                Help
            </h4>

            <ul>
                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Track Order
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Returns
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        Shipping
                    </a>
                </li>

                <li class="p-b-9">
                    <a href="#" class="s-text7">
                        FAQs
                    </a>
                </li>
            </ul>
        </div>

        <div class="w-size8 p-t-30 p-l-15 p-r-15 respon3">
            <h4 class="s-text12 p-b-30">
                Newsletter
            </h4>
            <form  method="post">
                @csrf
                <div class="effect1 w-size9">
                    <input class="s-text7 bg6 w-full p-b-5" type="email" name="emailSub" placeholder="Email">
                    <span class="effect1-line"></span>
                </div>

                <div class="w-size2 p-t-20">
                    <!-- Button -->
                    <button type="button" id="promotion" class="flex-c-m size11 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
                        Receive promotions
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="t-center p-l-15 p-r-15">
        <a href="#">
            <img class="h-size2" src="{{asset("images/icons/paypal.png")}}" alt="IMG-PAYPAL">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset("images/icons/visa.png")}}" alt="IMG-VISA">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset("images/icons/mastercard.png")}}" alt="IMG-MASTERCARD">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset("images/icons/express.png")}}" alt="IMG-EXPRESS">
        </a>

        <a href="#">
            <img class="h-size2" src="{{asset("images/icons/discover.png")}}" alt="IMG-DISCOVER">
        </a>

        <div class="t-center s-text8 p-t-20">
            Created at © 2020 All rights reserved. | This shop is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Kitchen Team</a>
        </div>
    </div>
</footer>



<!-- Back to top -->
<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
</div>

<!-- Container Selection1 -->
<div id="dropDownSelect1"></div>

<!-- Modal Video 01-->
<div class="modal fade" id="modal-video-01" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog" role="document" data-dismiss="modal">
        <div class="close-mo-video-01 trans-0-4" data-dismiss="modal" aria-label="Close">&times;</div>

        <div class="wrap-video-mo-01">
            <div class="w-full wrap-pic-w op-0-0"><img src="{{asset("images/icons/video-16-9.jpg")}}" alt="IMG"></div>
            <div class="video-mo-01">
                <iframe src="https://www.youtube.com/embed/j9V78UbdzWI?rel=0&amp;showinfo=0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $("#promotion").bind("click",function () {
        $.ajax({
            url: "{{url("postPromotion")}}",
            method: "POST",
            data: {
                _token: $("input[name=_token]").val(),
                emailSub: $("input[name=emailSub]").val(),
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
