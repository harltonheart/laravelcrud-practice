<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Profile extends Model
{
    protected $guarded = [];

    public function profileImage() //create this function if u want to create default post
    {
        $imagePath = ($this->image)? $this->image : 'profileImg/DefaultPP.png';

        return '/storage/' .$imagePath;
    }

    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
    public function user() //relation to user.php models , belongsTo
    {
        return $this->belongsTo(User::class);
    }
}
