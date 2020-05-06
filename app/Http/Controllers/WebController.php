<?php

namespace App\Http\Controllers;

use App\Category;
use App\Mail\email;
use App\Mail\OrderCreated;
use App\Order;
use App\Product;
use App\Brand;
use App\User;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function home(){
        $cateband = Category::all()->take(3);
        $brandband = Brand::all()->take(3);
        $sale = Product::take(8)->orderBy("price",'asc')->get();
        $ex = Product::take(8)->orderBy("price",'desc')->get();
        $new = Product::take(4)->orderBy("created_at",'desc')->get();
        $top = Product::all()->take(12);
        return view('home-page',['brandband'=>$brandband,'cateband'=>$cateband,'sale'=>$sale,'ex'=>$ex,'new'=>$new,'top'=>$top]);
    }

    public function product($id){
        $product=Product::find($id);
        $brand = Brand::find($product->brand_id);
        $category=Category::find($product->category_id);
        $brand_product =$brand->Products()->take(4)->get();
        $category_product =Category::find($product->category_id)->Products()->take(8)->get();
        return view('product',['product'=>$product,'category_product'=>$category_product,'brand_product'=>$brand_product,'brand'=>$brand,'category'=>$category]);
    }
    public function listingcate($id){
        $categories = Category::find($id);
        $product = $categories->Products()->paginate(12);
        return view('listCate',['product'=>$product,'categories'=>$categories]);
    }
    public function listingBrand($id){
        $brand = Brand::find($id);
        $product=$brand->Products()->paginate(9);
        return view("listBrand",['product'=>$product,'brand'=>$brand]);
    }
    public function shopping($id, Request $request){
        $product=Product::find($id);
        $cart =$request->session()->get("cart");

        if($cart==null){
            $cart=[];
        }
        foreach ($cart as $p){
            if($p->id == $product->id){
                $p->cart_qty =$p->cart_qty+1;
                session(["cart"=>$cart]);
                return redirect()->to("/cart");
            }
        }
        $product->cart_qty=1;
        $cart[]=$product;
        session(["cart"=>$cart]);
        return redirect()->to("/cart");
    }
    public function pshopping($id, Request $request){
        $product=Product::find($id);
        $cart =$request->session()->get("cart");
        $request->validate([
            'qty'=> 'required | string',
        ]);
        if($cart==null){
            $cart=[];
        }
        foreach ($cart as $p){
            if($p->id == $product->id){
                $p->cart_qty =$p->cart_qty+$request->get("qty");
                session(["cart"=>$cart]);
                return redirect()->to("/cart");
            }
        }
        $product->cart_qty=$request->get("qty");
        $cart[]=$product;
        session(["cart"=>$cart]);
        return redirect()->to("/cart");
    }


    public function cart(Request $request){
        $cart = $request->session()->get("cart");
        if($cart == null){
            $cart = [];
        }
        $cart_total = 0 ;
        foreach ($cart as $p){
            $cart_total += ($p->price*$p->cart_qty);
        }
        return view("cart",["cart"=>$cart,'cart_total'=>$cart_total]);

    }
    public function updateCart(Request $request){
        if(!$cart=session()->has("cart")){
            return redirect()->to("/");
        }
        $cart =$request-> session()->get('cart');

        if($cart==null){
            $cart=[];
        }
        foreach ($cart as $p){
            $product = Product::find($p->id);
            $p->cart_qty =$request->input("qty/$p->id");
            $cart[] = $product;
        }

        return redirect()->to("/cart");
    }


    public function reduceOne($id,Request $request){
        if(!$cart=session()->has("cart")){
            return redirect()->to("/");
        }
        $cart =$request-> session()->get('cart');
        foreach ($cart as $p){
            if($p->id ==$id){
                $p->cart_qty-=1;
                return redirect()->to("/cart");
            }
        }
        return redirect()->to("/cart");
    }
    public function increaseOne($id,Request $request){
        if(!$cart=session()->has("cart")){
            return redirect()->to("/");
        }
        $cart =$request-> session()->get('cart');
        foreach ($cart as $p){
            if($p->id ==$id){
                $p->cart_qty+=1;
                return redirect()->to("/cart");
            }
        }
        return redirect()->to("/cart");
    }


    public function deleteItemCart($id){
        $cartOld = session()->get("cart");
        session()->forget("cart");
        $cart=session()->get("cart");
        if($cart == null){
            $cart = [];
        }
        foreach ($cartOld as $c){
            if ($c->id !=$id){
                $product = Product::find($c->id);
                $product->cart_qty =$c->cart_qty;
                $cart[] = $product;
                session(["cart"=>$cart]);
            }
        }
        return redirect()->to("/cart");
    }

    public function clearCart(Request $request){
        $request->session()->forget("cart");
        return redirect()->to("/");
    }


    public function checkout(Request $request){
        if(!$request->session()->has("cart")){
            return redirect()->to("/");
        }
        $cart = $request->session()->get('cart');
        $cart_total = 0;
        foreach ($cart as $p){
            $cart_total += ($p->price * $p->cart_qty);
        }
        return view("checkout",["cart"=>$cart,'cart_total'=>$cart_total]);
    }
    public function placeOrder(Request $request){
        $request->validate([
            'customer_name'=> 'required | string',
            'shipping_address' => 'required',
            'payment_method'=> 'required',
            'telephone'=> 'required',
        ]);

        $cart = $request->session()->get('cart');
        $grand_total = 0;
        foreach ($cart as $p){
            $grand_total += ($p->price * $p->cart_qty);
        }
        $order = Order::create([
            'user_id'=>Auth::id(),
            'customer_name'=> $request->get("customer_name"),
            'shipping_address'=> $request->get("shipping_address"),
            'telephone'=> $request->get("telephone"),
            'grand_total'=> $grand_total,
            'payment_method'=> $request->get("payment_method"),
            "status"=> Order::STATUS_PENDING
        ]);
        foreach ($cart as $p){

            $product = Product::find($p->id);
            $product->update([
                "quantity" => $product->quantity-$p->cart_qty,
                "purchase" => $product->purchase+$p->cart_qty,

            ]);
            DB::table("order_product")->insert([
                'order_id'=> $order->id,
                'product_id'=>$p->id,
                'qty'=>$p->cart_qty,
                'price'=>$p->price
            ]);
        }
        Mail::to(Auth::user()->email)->send(new OrderCreated());
        session()->forget("cart");
        return redirect()->to("/checkout-success");
    }

    public function oldBill(Request $request){
        $orderPend = Order::where("user_id",Auth::id())->where("status",0)->get();
        $orderPro = Order::where("user_id",Auth::id())->where("status",1)->get();
        $orderShip = Order::where("user_id",Auth::id())->where("status",2)->get();
        $orderCom = Order::where("user_id",Auth::id())->where("status",3)->get();
        $orderCan = Order::where("user_id",Auth::id())->where("status",4)->get();
       return view("oldBill",['orderPend'=>$orderPend,'orderPro'=>$orderPro,'orderShip'=>$orderShip,'orderCom'=>$orderCom,'orderCan'=>$orderCan]);
    }

    public function deleteOrder($id)
    {
        $order = Order::find($id);
        try {
            if ($order->status != Order::STATUS_CANCEL) {
                $order->status = Order::STATUS_CANCEL;
                $order->save();
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
        Mail::to(Auth::user()->email)->send(new email());
        return redirect()->to("/");
    }


    public function checkoutSuccess(){
        return view("checkoutSuccess");
    }
    public function getListOrder(){

        $listOrder =Order::where ("user_id",Auth::id())->get();
        return view('listOrder',['listOrder'=>$listOrder]);
    }

    public function postLogin(Request $request){
        $validator = Validator::make($request->all(),[
            "email" => 'required|email',
            "password"=> "required|min:8"
        ]);

        if($validator->fails()){
            return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
        }
        $email = $request->get("email");
        $pass = $request->get("password");
        if(Auth::attempt(['email'=>$email,'password'=>$pass])){
            return response()->json(['status'=>true,'message'=>"Login successfully!"]);
        }
        return response()->json(['status'=>false,'message'=>"login failure"]);
    }

    public function profile(){
        $user = Auth::user();
        $order = Order::where("user_id",Auth::id())->paginate(1);
        $countPend = Order::where("user_id",Auth::id())->where("status",0)->get()->count();
        $countPro = Order::where("user_id",Auth::id())->where("status",1)->get()->count();
        $countShip = Order::where("user_id",Auth::id())->where("status",2)->get()->count();
        $countCom = Order::where("user_id",Auth::id())->where("status",3)->get()->count();
        $countCan = Order::where("user_id",Auth::id())->where("status",4)->get()->count();
        return view('profile',['user'=>$user,'order'=>$order,'countPend'=>$countPend,'countPro'=>$countPro,'countShip'=>$countShip,'countCom'=>$countCom,'countCan'=>$countCan]);
    }

    public function upProfile(Request $request){
        $user = User::find(Auth::id());
        $request->validate([
            "name"=>'required',
//            "email"=>'required|unique:users|email',
            "address"=>'string',
            "phone"=>'string|unique:users,phone,'.Auth::id(),
        ]);
        try{
           $user->update([
               "name"=>$request->get("name"),
               "address"=>$request->get("address"),
               "phone"=>$request->get("phone"),
           ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("/");
    }

    public function upAvt(Request $request){
        $user = User::find(Auth::id());
        try {
            $avt = null;
            if($request->hasFile("avt")) {
                $file = $request->file("avt");
                $file_name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $file->move("upload", $file_name);
                $avt = "upload/" . $file_name;
            }
            $user->update([
                "avt"=>$avt,
            ]);

        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("profile");
    }
}
