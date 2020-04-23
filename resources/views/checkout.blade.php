@extends('layout')
@section('all')
    <div class="container">
    <div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
        <h5 class="m-text20 p-b-24">
            Cart Totals
        </h5>

        <!--  -->
        <div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

            <span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
        </div>

        <!--  -->
        <div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Shipping:
					</span>

            <div class="w-size20 w-full-sm">
                <p class="s-text8 p-b-23">
                    There are no shipping methods available. Please double check your address, or contact us if you need any help.
                </p>

                <span class="s-text19">
							Calculate Shipping
						</span>

                <div class="rs2-select2 rs3-select2 rs4-select2 bo4 of-hidden w-size21 m-t-8 m-b-12">
                    <select class="selection-2" name="country">
                        <option>Select a country...</option>
                        <option>US</option>
                        <option>UK</option>
                        <option>Japan</option>
                    </select>
                </div>

                <div class="size13 bo4 m-b-12">
                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="state" placeholder="State /  country">
                </div>

                <div class="size13 bo4 m-b-22">
                    <input class="sizefull s-text7 p-l-15 p-r-15" type="text" name="postcode" placeholder="Postcode / Zip">
                </div>

                <div class="size14 trans-0-4 m-b-10">
                    <!-- Button -->
                    <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                        Update Totals
                    </button>
                </div>
            </div>
        </div>

        <!--  -->
        <div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

            <span class="m-text21 w-size20 w-full-sm">
						$39.00
					</span>
        </div>

        <div class="size15 trans-0-4">
            <!-- Button -->
            <button class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                Proceed to Checkout
            </button>
        </div>
    </div>
    </div>
@endsection
