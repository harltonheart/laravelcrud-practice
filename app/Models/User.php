<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Profile;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected static function boot(){    //this is the whole functionality when u register a user it will also create a profile table which relational to user table
                                        //t means if u add data in table it will also add data to other table
                                        //which is the userTable and profileTable
    
        parent::boot();

        static::created(function ($user){

            // $user->profile()->create();      
              $user->profile()->create([      //this code which is relation to user every register user they create a profile table
                 'title' => 'This is Title', //this array will supply the username into titleTable in profiles table
                'description' => 'This is Sample Description',
                 ]);
        });
    }
    
    public function posts() //relation to Post.php models hasMany() which is how many post u created thats all belongs to user
    {
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC'); //orderBy('created_at', 'DESC') which means sorted by date latest post would be the first preview
    }

    public function profile() //relation to Profile.php models hasOne() which is only one profile
    {
        return $this->hasOne(Profile::class);
    }

    
}
