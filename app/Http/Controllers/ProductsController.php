<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Product;
use Auth;
use Image;
use App\Notifications\NewProduct;
use App\Notifications\ProductAdded;
use App\User;


class ProductsController extends Controller
{

  public function getAllProducts(){
    $products = Product::paginate(5);
    return view('products.index',['products'=>$products]);
  }

  public function getMyProducts($user_id){
    $myproducts = Product::where('user_id','=',$user_id)->paginate(5);
    return view('products.myproducts',['myproducts'=>$myproducts]);
  }

    public function create(){
    	$categories = Category::all();
    	$cities = City::all();
    	return view('products.create',['categories'=>$categories,'cities'=>$cities]);
    }

    public function store(Request $request){

    	$this->validate($request,array(
    		'name'=>'required',
    		'description'=>'required|max:1000',
        'phone'=>'required',
    		'price'=>'required',
    		'category'=>'required',
    		'city'=>'required'
    	));

    	$product = new Product();
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
      $product->phone_number = $request->input('phone');
    	$product->category_id = $request->input('category');
    	$product->city_id = $request->input('city');
    	$product->user_id = Auth::user()->id;

      // Image upload
      if(Input::hasFile('file')){
        $image = $request->file('file');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/products');
        $img = Image::make($image->getRealPath());
        $img->resize(100,100,function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $image->move($destinationPath, $input['imagename']);
        $path = "products/".$input['imagename'];
        $product->cover_image = $path;
      }
    	$product->save();

      Auth::user()->notify(new NewProduct($product));

      // Get all admin users and send them a notification for this product being posted
      $admins = User::role('super_admin')->get();
      //dd($admins);
      foreach ($admins as $admin) {
        $admin->notify(new ProductAdded($product,Auth::user()->firstname));
      }

    	return redirect()->route('home');

    }

    public function update(Request $request,$product_id){

    	$this->validate($request,array(
    		'name'=>'required',
    		'description'=>'required|max:1000',
        'phone'=>'required',
    		'price'=>'required',
    		'category'=>'required',
    		'city'=>'required'
    	));

    	$product = Product::find($product_id);
    	$product->name = $request->input('name');
    	$product->description = $request->input('description');
    	$product->price = $request->input('price');
      $product->phone_number = $request->input('phone');
    	$product->category_id = $request->input('category');
    	$product->city_id = $request->input('city');
    	$product->user_id = Auth::user()->id;

      // Image upload
      if(Input::has('file')){
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/products');
        $img = Image::make($image->getRealPath());
        $img->resize(100,100,function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $image->move($destinationPath, $input['imagename']);
        $path = "products/".$input['imagename'];

        $product->cover_image = $path;
      }
    	$product->save();
      Auth::user()->notify(NewProduct($product));
    	return redirect()->route('home');

    }

    public function edit($product_id){
      $product = Product::find($product_id);

      return view('products.edit',['product'=>$product]);
    }


    public function delete($product_id){
      $product = Product::find($product_id);

      $product->delete();

      return redirect()->back();
    }

    public function getSingleProduct($product_id){
      $product = Product::find($product_id);

      return view('products.single',['product'=>$product]);
    }
}
