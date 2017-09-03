<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Need;
use App\Product;
class SearchController extends Controller
{
    public function search(){
      return view('pages.search');
    }



    public function filter(Request $request){
      $type = $request->input('type');

      switch ($type) {
        case 'need':
          $query = Need::query();
          if(Input::has('name')){
            $query->where('name','LIKE',Input::get('name'));
          }
          if(Input::has('category_id')){
            $query->where('category_id','=',Input::get('category'));
          }
          if(Input::has('city')){
            $query->where('city_id','=',Input::get('city'));
          }
          $needs = $query->get();
          return view('pages.search',['needs'=>$needs]);
        break;

        case 'product':
          $query = Product::query();
          if(Input::has('name')){
            $query->where('name','LIKE',Input::get('name'));
          }
          if(Input::has('category_id')){
            $query->where('category_id','=',Input::get('category'));
          }
          if(Input::has('city')){
            $query->where('city_id','=',Input::get('city'));
          }
          $products = $query->get();
          return view('pages.search',['products'=>$products]);
        break;
      }
    }
}
