<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Mail\OrderConfirmed;
use App\Message;
use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Feature;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class PagesController extends Controller
{
    public function home() {
        $product = Product::orderBy('id','desc')->where('featured','featured')->take(4)->get();
        return view('home',compact('product'));
    }

    public function catalog(Request $request) {
        $perpage = 12;
        $query = Product::where('sale', 'active')->orderBy('id','desc');
        if($request->search) {
            $search = $request->search;
            $title = "title_".app()->getLocale();
            $category = "category_".app()->getLocale();
            $description = "description_".app()->getLocale();
            $query = $query->where($title,'like','%'.$search.'%')->orWhere('brand','like','%'.$search.'%')->orWhere($category,'like','%'.$search.'%')->orWhere($description,'like','%'.$search.'%');
        }
        if($request->category) {
            $categorylang = "category_".app()->getLocale();
            $category = $request->category;
            $query = $query->where($categorylang,$category);
        }
        if($request->brand) {
            $brand = $request->brand;
            $category = $request->category;
            $query = $query->where('brand',$brand[0]);
            if(count($brand)>1) {
                for ($i = 1; $i < count($brand); $i++)
                    $query = $query->orwhere('brand', $brand[$i]);
            }
        }
        if($request->min&&!empty($request->min)) {
            $min = $request->min;
            $query = $query->where('price','>=',$min);
        }
        if($request->max&&!empty($request->max)) {
            $max = $request->max;
            $query = $query->where('price','<=',$max);
        }
        $allProducts = $query->get();
        $products = $query->paginate($perpage);
        $category_db = \DB::table('products')->groupBy('category_en')->orderBy(\DB::raw('count(category_en)'),'DESC')->get();
        $brand_db = \DB::table('products')->groupBy('brand')->orderBy(\DB::raw('count(brand)'),'DESC')->get();
        foreach($brand_db as $item) {
            $count = Product::where('brand',$item->brand)->count();
            $item->count = $count;
        }
        return view('catalog',compact('products','brand_db','category_db','perpage','request','allProducts'));
    }

    public function product($id) {
        $feature = Feature::where('product_id',$id)->get();
        $product = Product::find($id);
        $products = Product::where('sale', 'active')->orderBy('id','desc')->where('category_en',$product->category_en)->where('id','!=',$id)->take(4)->get();
        return view('product',compact('product','feature','products'));
    }

    public function orderConfirm($id, Request $request) {
        $quantity = $request->quantity;
        $name = $request->name;
        $mobile = $request->mobile;
        $delivery = $request->delivery;
        $product = Product::find($id);
        $products = Product::where('sale', 'active')->take(4)->get();
        $request->product = $product->title_en;
        Order::insert([
            'product_desc' => $product->id." - ".$product->title_en,
            'quantity' => $quantity,
            'name' => $name,
            'mobile' => $mobile,
            'delivery' => $delivery,
        ]);
        Mail::to('almeida0085@gmail.com')->send(new OrderConfirmed($request));
        return view('orderconfirm',compact('quantity','product','products'));
    }

    public function contact() {
        return view('contact');
    }

    public function sendMessage(Request $request) {
        Message::insert([
            'name' => $request->name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'message' => $request->message,
        ]);
        Mail::to('almeida0085@gmail.com')->send(new ContactEmail($request));
        return redirect()->back()->with('message','Message is sent');
    }

    public function about() {
        return view('about');
    }

    public function admin() {
        $brands = Product::groupBy('brand')->get();
        $categories = Product::groupBy('category_en')->get();
        return view('admin',compact('brands','categories'));
    }
    public function adminProduct(Request $request) {
        if(empty($request->brand)) {
            $brand = $request->brand_new;
        }
        else {
            $brand = $request->brand;
        }
        if(empty($request->category)) {
            $category_az = $request->category_az;
            $category_ru = $request->category_ru;
            $category_en = $request->category_en;
        }
        else {
            $categorySelect = $request->category;
            $category = Product::where('category_en',$categorySelect)->first();
            $category_az = $category->category_az;
            $category_ru = $category->category_ru;
            $category_en = $category->category_en;
        }
        $id = Product::insertGetId([
            'title_az' => $request->title_az,
            'title_ru' => $request->title_ru,
            'title_en' => $request->title_en,
            'price' => $request->price,
            'brand' => $brand,
            'category_az' => $category_az,
            'category_ru' => $category_ru,
            'category_en' => $category_en,
            'description_az' => $request->description_az,
            'description_ru' => $request->description_ru,
            'description_en' => $request->description_en,
            'sale' => $request->sale,
            'featured' => $request->featured,

        ]);

        $directory = "images/products/product_id_".$id;
        mkdir($directory);
        $images = $_FILES['images'];

        for ($i=0;$i<count($images['name']);$i++) {
            move_uploaded_file($images['tmp_name'][$i],$directory."/".$images['name'][$i]);
        }

        $pro_name_az = $request->property_name_az;
        $pro_name_ru = $request->property_name_ru;
        $pro_name_en = $request->property_name_en;
        $pro_value_az = $request->property_value_az;
        $pro_value_ru = $request->property_value_ru;
        $pro_value_en = $request->property_value_en;
        for ($i=0;$i<count($pro_name_az);$i++) {
            Feature::insert([
                'product_id' => $id,
                'property_name_az' => $pro_name_az[$i],
                'property_name_ru' => $pro_name_ru[$i],
                'property_name_en' => $pro_name_en[$i],
                'property_value_az' => $pro_value_az[$i],
                'property_value_ru' => $pro_value_ru[$i],
                'property_value_en' => $pro_value_en[$i],
            ]);
        }

        return redirect()->back()->with('message', 'Product Added!');
    }
}
