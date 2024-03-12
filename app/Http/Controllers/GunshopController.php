<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class GunshopController extends Controller
{
    public function gunshop(){
        if(Auth::id()){

            $data = product::paginate(3);
            return view('user.gunshop', compact('data'));
            
            
        } else{

            return redirect('gunshop');
        }
    }
}
