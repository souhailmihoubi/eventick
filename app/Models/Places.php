<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    protected $table = 'places';
    protected $fillable = [

        'gov_id',
        'name',
        'nbMax',
    ];

    public function government()
    {
        return $this->belongsTo(Government::class,'gov_id','id');
    }
    public function getPlaceIdP($idType)
    {
        //returns a name
        $type = Type::find($idType);
        return $type->place_id;
    }
}
