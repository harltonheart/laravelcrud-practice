<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;

class ProfilesController extends Controller
{
    public function index(User $user) //use this parameter, then import the class
    {                               //instead of adding this code inside the func -> $user = User::findOrFail($user);
        
        return view('profiles.index', [
            'user' => $user, //to define variable in this page (profile.blade)
        ]);
    }

    public function edit(User $user)
    {
        // dd($user);
        $this->authorize('update', $user->profile); //authorize which means going to ProfilePolicy.php
                                                    //then ('update') is the update function then get supply the 
                                                    //$user->profile which is the parameter or a relation
                                                    //then add @can('update', $user->profile) @endcan
                                                    //to your views, so the other users cant access the edit post

        return view('profiles.edit', [  //or compact('user')
            'user' => $user
        ]);
    }

    public function update(Profile $profiles)
    {

        $profiles->update(request()->all());



        return redirect("/profile/{$profiles->id}");
    }


}
