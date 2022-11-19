<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Places;
use App\Models\Ticket;
use App\Models\Eventdates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class EventDatesController extends Controller
{

  /*   public function add($id)
    {
        $ticket = Ticket::find($id);

        $place = Places::all();
        return view('admin.eventdates.add',compact('ticket','place'));
    } */

    public function add($idt,$id)
    {
        $place = Places::find($id);
        $ticket = Ticket::find($idt);
        $type = Type::all();
        $eventdate = Eventdates::all();
        return view('admin.eventdates.add',compact('type','place','ticket','eventdate'));
    }

    public function insert(Request $request,$idt,$idp)
    {

        $date = $request->date;
        $time = $request->time;
        $datasave = [
            'place_id' => $idp,
            'ticket_id' => $idt,
            'date' => $date,
            'time' => $time,
        ];
        DB::table('eventdates')->insert($datasave);
        return redirect('tickets');
    }
}
