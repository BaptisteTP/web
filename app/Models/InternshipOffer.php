<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class InternshipOffer extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'title',
        'duration_numerical',
        'duration_unit',
        'companies_id',
        'date',
        'salary',
        'num_place',
        'text',
        'status_id',
        'type_promotions_id',
        'location_id',
    ];

    public function location()
    {
        return $this->belongsTo(Locations::class, 'location_id');
    }

    public function type_promotions()
    {
        return $this->belongsTo(Type_promotions::class, 'type_promotions_id');
    }

    public function sector()
    {
        return $this->belongsTo(Sectors::class, 'sector_id');
    }


}
