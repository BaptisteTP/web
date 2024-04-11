<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status_internships extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'status_internships';
    protected $fillable = ['status'];
}
