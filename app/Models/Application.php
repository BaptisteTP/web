<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'application';
    protected $fillable = ['cv', 'cover_letter', 'offer_id','user_id'];

}
