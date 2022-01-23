<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function index(){
            //you can't access logout page url once u login
          return redirect()->route('welcome');
      }
      public function store(){
          
          auth()->logout();
  
          return redirect()->route('home');
      }
}
