<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventdates extends Model
{
    use HasFactory;
    protected $table = 'eventdates';
    protected $fillable = [

        'ticket_id',
        'place_id',
        'date',
        'time',
    ];
    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }

    public function place()
    {
        return $this->belongsTo(Places::class,'place_id','id');
    }

    
}
