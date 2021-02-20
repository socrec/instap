<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'title',
        'bio',
        'dob',
        'is_public',
        'avatar',
        'text',
        'user_id',
        'facebook',
        'instagram',
        'twitter',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
