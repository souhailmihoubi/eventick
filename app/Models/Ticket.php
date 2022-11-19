<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPUnit\Framework\returnSelf;

class Ticket extends Model
{
    use HasFactory;
    protected $table = 'ticket';
    protected $fillable = [

        'cate_id',
        'name',
        'discription',
        'image',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class,'cate_id','id');
    }
    
    public function getEventDate($ticketId){
        
        $dates = Eventdates::where('ticket_id',$ticketId)->get();
        
        return $dates[0]->date;
    }

    public function getEventTime($ticketId){
        
        $times = Eventdates::where('ticket_id',$ticketId)->get();
        return $times[0]->time;
    }

    

    public function getQuatitySum($ticketId)
    {
        //returns a name
        $types = TypeByTicket::where('ticket_id',$ticketId)->get();
        $sum=0;
        for($i = 0; $i<count($types); $i++){
            $sum += $types[$i]->quantity;
        }
        return $sum;
    }

    public function ticketAvailable(){
        $ticket = Ticket::all();
        $sum = 0;
        for($i = 0; $i<count($ticket); $i++){
            if($ticket[$i]->getQuatitySum($ticket[$i]->id)>0)
            $sum += 1;
        }
        return $sum;
    }

    public function ticketNotAvailable(){
        $ticket = Ticket::all();
        $sum = 0;
        for($i = 0; $i<count($ticket); $i++){
            if($ticket[$i]->getQuatitySum($ticket[$i]->id)==0)
            $sum += 1;
        }
        return $sum;
    }
}
