<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Category;
use App\City;
use App\Product;
use App\Need;
use Auth;
use Image;
use App\User;
use DB;
use Flashy;
use App\Notifications\NewNeed;
use App\Notifications\NeedAdded;
use Nexmo\Laravel\Facade\Nexmo;

class NeedsController extends Controller
{
    public function getAllNeeds(){
      $needs = Need::paginate(5);

      return view('needs.index',['needs'=>$needs]);
;    }

    public function getMyNeeds($user_id){
      $myneeds = Need::where('user_id','=',$user_id)->paginate(5);

    	return view('needs.myneeds',['myneeds'=>$myneeds]);
    }

    public function create(){
    	$categories = Category::all();
    	$cities = City::all();
    	return view('needs.create',['categories'=>$categories,'cities'=>$cities]);
    }


    public function store(Request $request){
    	$this->validate($request,array(
    		'name'=>'required',
    		'description'=>'required|max:1000',
        'phone'=>'required',
    		'pricefrom'=>'required',
        'priceto'=>'required',
    		'category'=>'required',
    		'city'=>'required'
    	));


    	$need = new Need();
      $need_image="";
    	$need->name = $request->input('name');
    	$need->description = $request->input('description');
      $need->phone_number = $request->input('phone');
    	$need->priceFrom = $request->input('pricefrom');
      $need->priceTo = $request->input('priceto');
    	$need->category_id = $request->input('category');
    	$need->user_id = Auth::user()->id;
      $need->city_id = $request->input('city');

      // Image upload
      if(Input::hasFile('file')){
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/needs');
        $img = Image::make($image->getRealPath());
        $img->resize(100,100,function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $image->move($destinationPath, $input['imagename']);
        $path = "needs/".$input['imagename'];
        $need->cover_image = $path;
      }

      $need->save();

      $nexmo = app('Nexmo\Client');
        $nexmo->message()->send([
            'to' => '0037745370015',
            'from' => '16105552344',
            'text' => 'Using the instance to send a message.'
        ]);

      Auth::user()->notify(new NewNeed($need));

      if(Auth::user()->getRole() != 'super_admin'){
        // Get all admin users and send them a notification for this product being posted
        $admins = User::role('super_admin')->get();
        //dd($admins);
        foreach ($admins as $admin) {
          $admin->notify(new NeedAdded($need,Auth::user()->firstname));
        }
      }

    	return redirect()->route('home');
    }

    public function update(Request $request,$need_id){
      $need = Need::find($need_id);

      $need->name = $request->input('name');
      $need->description = $request->description;
      $need->category_id = $request->category;
      $need->city_id = $request->city;

      // Image upload
      if(Input::has('file')){
        $image = $request->file('file');
        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/needs');
        $img = Image::make($image->getRealPath());
        $img->resize(100,100,function($constraint){
          $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $image->move($destinationPath, $input['imagename']);
        $path = "needs/".$input['imagename'];
        $need->cover_image = $path;
      }

      $need->update();

      return redirect()->route('home');

    }

    public function delete($need_id){
      $need = Need::find($need_id);
      $need->delete();

      return redirect()->back();
    }

    public function getSingleNeed($need_id){
      $need = Need::find($need_id);

      return view('needs.single',['need'=>$need]);
    }

    public function getMySingleNeed($need_id){
      $need = Need::find($need_id);

      return view('needs.mysingleneed',['need'=>$need]);
    }

    public function getEdit($need_id){
      $need = Need::find($need_id);
      return view('needs.edit',['need'=>$need]);
    }

    public function findBuyersForNeed($p_id){
      $thisprod = DB::table('products')->where('id','=',$p_id)->get();
      foreach ($thisprod as $prod) {
        $needs = Need::where('name','LIKE','%'.$prod->name.'%')->paginate(5);
      }
      return view('pages.findbuyer',['needs'=>$needs]);
    }

}
