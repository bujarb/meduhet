<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Product;
use App\Message;
use App\Need;
use App\User;
use Auth;
use Mail;
use App\Mail\NewUserWelcome;
use App\Messages;

class PageController extends Controller
{
    public function getWelcome(){
    	$products = Product::orderBy('created_at','DESC')->take(4)->get();
    	$needs = Need::orderBy('created_at','DESC')->take(4)->get();
      $data = array(
        'products'=>$products,
        'needs'=>$needs
      );
    	return view('pages.welcome',$data);
    }

    public function getAbout(){
    	return view('pages.about');
    }

    public function getContact(){
    	return view('pages.contact');
    }

    public function getProductMatchNeedPage(Need $need){
      return view('pages.productmatchneeds');
    }

    public function sendMessage(Request $request,$user_id){
      $this->validate($request,['title'=>'required|min:3|max:100','body'=>'required']);

      $message = new Message();
      $message->from = Auth::user()->id;
      $message->to = $user_id;
      $message->title = $request->input('title');
      $message->body = $request->input('body');
      $message->save();

      return redirect()->route('home');
    }

    public function getMessagesPage(){
      $messages = DB::table('messages')->where('to','=',Auth::user()->id)->get();
      return view('pages.messages.index',['messages'=>$messages]);
    }

    public function getComposeMessage($user_id){
      $userTo = User::find($user_id);
      return view('pages.messages.compose',['userTo'=>$userTo]);
    }

    public function viewMessage($msg_id){
      $message = Message::where('id','=',$msg_id)->get();
      //dd($message);
      return view('pages.messages.single',['message'=>$message]);
    }
}
