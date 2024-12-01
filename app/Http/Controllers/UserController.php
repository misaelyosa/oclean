<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Roles;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(){
  
        return view('user.index', ['title'=>'home']);
    }
    public function indexShop(){
  
        return view('user.shop', ['title'=>'shop']);
    }
    public function indexCustServ(){
  
        return view('user.customer_service', ['title'=>'custserv']);
    }
    public function indexPickUp(){
  
        return view('user.pickup_sampah', ['title'=>'pickup']);
    }
   
}
