<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class UserInfo extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'grade',
        'university',
        'department',
        'course',
        'interest_area',
        'strong_point',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
