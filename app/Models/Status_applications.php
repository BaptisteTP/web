<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_applications extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'status_applications';
    protected $fillable = ['status','application_id'];
}
