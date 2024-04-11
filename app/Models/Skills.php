<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'skill';
    protected $fillable = ['skill'];
}
