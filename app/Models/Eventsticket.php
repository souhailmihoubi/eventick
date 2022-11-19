<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eventsticket extends Model
{
    use HasFactory;
    protected $table = 'eventsticket';
    protected $fillable = [

        'event_id',
        'user_id',
        'pdf',
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class,'event_id','id');
    }
    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
}

