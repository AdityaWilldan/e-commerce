<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\Product;

use function Laravel\Prompts\search;

class HomeController extends Controller
{
    public function redirect(){
        $usertype = Auth::user()->usertype;

        if($usertype == '1'){
            return view('admin.home');
        } else{
            $data = product::paginate(3);

            $user = auth()->user();
            $count = cart::where('phone',$user->phone)->count();
            return view('user.home', compact('data', 'count'));
        }
    }

    public function index(){
        if(Auth::id()){

            return redirect('redirect');
            
        } else{

            $data = product::paginate(3);
            return view('user.home', compact('data'));
        }
        }

    public function search(Request $request){
        $search = $request->search;
        $user = auth()->user();
        $count = cart::where('phone', $user->phone)->count();

        if($search == ''){
            $data = product::paginate(3);
            return view('user.home', compact('data', 'count'));
        }

        $data = product::where('title','Like','%'.$search.'%')->get();

        return view('user.home', compact('data', 'count'));
    }

    public function checkout(Request $request, $id){
        if(Auth::id()){

            $user = auth()->user();
            $product = product::find($id);

            $cart = new cart;

            $cart->name = $user->name;
            $cart->phone = $user->phone;
            $cart->address = $user->address;
            $cart->product_title = $product->title;
            $cart->price = $product->price;
            $cart->quantity = $request->quantity;
            $cart->save();

            return redirect()->back()->with('message', 'Checkout Product berhasil!');
        } else{
            return redirect('login');
        }
    }

    public function showcart(){

        $user = auth()->user();
        $cart = cart::where('phone',$user->phone)->get();
        $count = cart::where('phone',$user->phone)->count();
        return view('user.showcart', compact('count','cart'));
    }

    public function deletechekout($id){

        $data = cart::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('message', 'Checkout Product dibatalkan!');
    }
       
}
