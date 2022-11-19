<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeByTicket extends Model
{
    use HasFactory;
    protected $table = 'type_by_ticket';
    protected $fillable = [

        'ticket_id',
        'type_id',
        'price',
        'quantity',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class,'type_id','id');
    }
    public function getTypeName($idType)
    {
        //returns a name
        $type = Type::find($idType);
        return $type->name;
    }
    public function getPlaceId($idType)
    {
        //returns a name
        $type = Type::find($idType);
        return $type->place_id;
    }
}
