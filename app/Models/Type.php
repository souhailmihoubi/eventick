<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $table = 'type';
    protected $fillable = [

        'place_id',
        'name',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'ticket_id','id');
    }
    public function places()
    {
        return $this->belongsTo(Places::class,'place_id','id');
    }
}
