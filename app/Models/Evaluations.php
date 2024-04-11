<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evaluations extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'evaluations';
    protected $fillable = ['note','companies_id','users_id'];

}
