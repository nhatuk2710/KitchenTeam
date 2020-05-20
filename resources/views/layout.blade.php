<!DOCTYPE html>
<html lang="en">
@includeIf('html.head')


<body class="animsition">

<!-- header fixed -->
@includeIf('html.header')

<!-- Slide1 -->


<!-- Banner -->
@yield('all')


<!-- Footer -->
@includeIf('html.footer')


@includeIf('html.script')
@yield('popup')

<!-- Modal -->

@if(!Auth::check())
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                        <div class="wrap-login100  p-l-110 p-r-110 p-t-62 p-b-33" style="background-color: whitesmoke">
                            <form method="post" class="login100-form validate-form flex-sb flex-w">
                                @csrf
					<span class="login100-form-title p-b-53">
						Sign In With
					</span>

                                <a href="{{ url('/auth/redirect/facebook') }}" class="btn-face m-b-20">
                                    <i class="fa fa-facebook-official"></i>
                                    Facebook
                                </a>

                                <a href="{{ url('/auth/google') }}" class="btn-google m-b-20">
                                    <img src="{{asset("th/images/icons/icon-google.png")}}" alt="GOOGLE">
                                    Google
                                </a>

                                <div class="p-t-31 p-b-9">
						<span class="txt1">
							Email
						</span>
                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Username is required">
                                    <input class="input100" type="email" name="email" >
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="p-t-13 p-b-9">
						<span class="txt1">
							Password
						</span>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="txt2 bo1 m-l-5">
                                            Forgot?
                                        </a>
                                    @endif


                                </div>
                                <div class="wrap-input100 validate-input" data-validate = "Password is required">
                                    <input class="input100" type="password" name="password" >
                                    <span class="focus-input100"></span>
                                </div>

                                <div class="container-login100-form-btn m-t-17">
                                    <button type="button" id="loginBtn" class="login100-form-btn">
                                        Sign In
                                    </button>
                                </div>

                                <div class="w-full text-center p-t-55">
						<span class="txt2">
							Not a member?
						</span>

                                    <a href="{{url("register")}}" class="txt2 bo1">
                                        Sign up now
                                    </a>
                                </div>
                            </form>
                        </div>
            </div>
        </div>
    <script type="text/javascript">
        $("#loginBtn").bind("click",function () {
            $.ajax({
                url: "{{url("postLogin")}}",
                method: "POST",
                data: {
                    _token: $("input[name=_token]").val(),
                    email: $("input[name=email]").val(),
                    password: $("input[name=password]").val(),
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
    @endif
</body>
</html>
