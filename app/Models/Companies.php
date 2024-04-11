<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $table = 'companies';
    protected $fillable = ['name', 'visibility', 'sectors_id','body'];

}
