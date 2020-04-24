<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    //AdminHome
    public function dashboard(){
        return view('admin.dashboard');
    }

    //Category
    public function tableCate(){
        $categories = Category::all();
        return view('admin.category.tableCate',['categories'=>$categories]);
    }
    public function cateCreate(){
        return view('admin.category.cateCreate');
    }
    public function catepost(Request $request){
        $request->validate([
            "category_name"=>"required|string|unique:category"

        ]);
        try{
            Category::create([
                "category_name"=>$request->get("category_name")
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category/tableCate");
    }
    public function cateEdit($id){
        $category = Category::find($id);
        return view('admin.category.cateEdit',['category'=>$category]);
    }
    public function catePostEdit($id, Request $request){
        $category = Category::find($id);
        $request->validate([
            "category_name"=> "string|unique:category,category_name,".$id
        ]);
        try {
            $category->update([
                "category_name"=>$request->get('category_name')
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category/tableCate");
    }
    public function cateDestroy($id){
        $category = Category::find($id);

        try {
            $category->delete();
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category/tableCate");
    }


    //Brand
    public function tableBrand(){
        $brands = Brand::all();
        return view('admin.brand.tableBrand',['brands'=>$brands]);
    }
    public function brandCreate(){
        return view('admin.brand.brandCreate');
    }
    public function brandpost(Request $request){
        $request->validate([
            "brand_name"=>"required|string|unique:brand"
        ]);
        try{
            Brand::create([
                "brand_name"=>$request->get("brand_name")
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand/tableBrand");
    }
    public function brandEdit($id){
        $brand = Brand::find($id);
        return view('admin.brand.brandEdit',['brand'=>$brand]);
    }
    public function brandPostEdit($id, Request $request){
        $brand = Brand::find($id);
        $request->validate([
            "brand_name"=> "string|unique:brand,brand_name,".$id
        ]);
        try {
            $brand->update([
                "brand_name"=>$request->get('brand_name')
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand/tableBrand");
    }

    //Product
    public function tableProduct(){
        $products = Product::all();
        return view('admin.product.tableProduct',['products'=>$products]);
    }
    public function productCreate(){
        $brand = Brand::all();
        $category=Category::all();
        return view('admin.product.productCreate',['brand'=>$brand,'category'=>$category]);
    }
    public function productpost(Request $request){
        $request->validate([
            "product_name"=>"required|string|unique:product",
            "product_desc"=>"required|string",
            "thumbnail"=>"required|string",
            "gallery"=>"required|string",
            "price"=>"required|int",
            "quantity"=>"required|int",
            "brand_id"=>"required|int",
            "category_id"=>"required|int",

        ]);
        try{
            $image = null;
            if($request->hasFile("image")) {
                $file = $request->file("image");
                $file_name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $file->move("upload", $file_name);
                $image = "upload/" . $file_name;
            }
            Product::create([
                "product_name"=>$request->get("product_name"),
                "product_desc"=>$request->get("product_desc"),
                "thumbnail"=>$request->get("thumbnail"),
                "gallery"=>$request->get("gallery"),
                "price"=>$request->get("price"),
                "quantity"=>$request->get("quantity"),
                "brand_id"=>$request->get("brand_id"),
                "category_id"=>$request->get("category_id"),
                "image"=>$image,

            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product/tableProduct");
    }
    public function productEdit($id){
        $product = Product::find($id);
        $brand = Brand::all();
        $category=Category::all();
        return view('admin.product.productEdit',['product'=>$product,'brand'=>$brand,'category'=>$category]);
    }
    public function productPostEdit($id, Request $request){
        $product = Product::find($id);
        $request->validate([
            "product_name"=>"string:product,product_name,".$id,
            "product_desc"=>"string:product,product_desc,".$id,
            "thumbnail"=>"string:product,thumbnail,".$id,
            "gallery"=>"string:product,gallery,".$id,
            "price"=>"int:product,price,".$id,
            "quantity"=>"int:product,quantity,".$id,
            "brand_id"=>"int:product,brand_id,".$id,
            "category_id"=>"int:product,category_id,".$id,
        ]);
        try{
            $image = null;
            if($request->hasFile("image")) {
                $file = $request->file("image");
                $file_name = $file->getClientOriginalName();
                $ext = $file->getClientOriginalExtension();
                $file->move("upload", $file_name);
                $image = "upload/" . $file_name;
            }
            $product->update([
                "product_name"=>$request->get("product_name"),
                "product_desc"=>$request->get("product_desc"),
                "thumbnail"=>$request->get("thumbnail"),
                "gallery"=>$request->get("gallery"),
                "price"=>$request->get("price"),
                "quantity"=>$request->get("quantity"),
                "brand_id"=>$request->get("brand_id"),
                "category_id"=>$request->get("category_id"),
                "image"=>$image,
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product/tableProduct");

    }

    public function createCategory(Request $request){
        $validator = Validator::make($request->all(),[
            "category_name" => 'required|string|unique:category',
        ]);
        if( $validator->fails()){
            return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
        } else {
            Category::create([
                "category_name"=>$request->get("category_name")
            ]);
            return response()->json(['status'=>true,'message'=>"Create success"]);
        }

    }

    public function createBrand(Request $request){
        $validator = Validator::make($request->all(),[
            "brand_name" => 'required|string|unique:brand',
        ]);
        if( $validator->fails()){
            return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
        } else {
            Brand::create([
                "brand_name"=>$request->get("brand_name")
            ]);
            return response()->json(['status'=>true,'message'=>"Brand success"]);
        }

    }

    public function editBrand($id,Request $request){
        $brand = Brand::find($id);
        $validator = Validator::make($request->all(),[
            "brand_name" => 'required|string|unique:brand'.$id,
        ]);
        if($validator->fails()){
            return response()->json(['status'=>false,"message"=>$validator->errors()->first()]);
        }else{
            $brand->update([
                "brand_name"=>$request->get("brand_name")
            ]);
            return response()->json(["status"=>true,"message"=>"Brand succcess"]);
        }
    }
}
