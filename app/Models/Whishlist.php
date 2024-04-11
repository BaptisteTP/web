<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Whishlist extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'wishlist';
    protected $fillable = ['internship_offers_id','users_id'];
}
