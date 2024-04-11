<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Internship_offer_skills extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'internship_offer_skills';
    protected $fillable = ['skills_idskills','internship_offer_id'];

}
