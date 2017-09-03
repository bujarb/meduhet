<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Need;
use App\Product;
use DB;
use App\User;

class UserController extends Controller
{
    public function getProfile(){
      $data = Auth::user();
      $needs = Need::where('user_id','=',Auth::user()->id)->get();
      $products = Product::where('user_id','=',Auth::user()->id)->get();
    	return view('user.my',['data'=>$data,'needs'=>$needs,'products'=>$products]);
    }

    public function viewUserProfile($user_id){
      $user = User::find($user_id);
      //dd($user);
      $needs = Need::where('user_id','=',$user_id)->get();
      $products = Product::where('user_id','=',$user_id)->get();
      return view('user.viewprofile',['user'=>$user,'needs'=>$needs,'products'=>$products]);
    }

    public function getEdit(){
      $user = Auth::user();
      return view('user.edit',['user'=>$user]);
    }
}
