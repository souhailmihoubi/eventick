<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Places;
use App\Models\Ticket;
use App\Models\Category;
use App\Models\Eventdates;
use App\Models\Government;
use App\Models\TypeByTicket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class TicketController extends Controller
{

    public function index()
    {
        $ticket = Ticket::all();

        return view('admin.ticket.index', compact('ticket'));
    }


    public function add()
    {
        $ticket = Ticket::all();
        $category = Category::all();

        return view('admin.ticket.add', compact('category'));
    }


    public function insert(Request $request)
    {
        $ticket = new Ticket();

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/tickets/', $filename);
            $ticket->image = $filename;
        }
        $ticket->cate_id = $request->input('cate_id');
        $ticket->name = $request->input('name');
        $ticket->discription = $request->input('discription');
        $ticket->save();
        return redirect('typelist/' . $ticket->id);
    }

    public function edit($id)
    {
        $ticket = Ticket::find($id);
        $types = TypeByTicket::where('ticket_id', $id)->get();
        $time = Eventdates::where('ticket_id', $id)->get();
        $time = $time[0];
        $place_id = $types[0]->getPlaceId($types[0]->type_id);
        $place = Places::find($place_id);
        return view('admin.ticket.edit', compact('ticket', 'types', 'time', 'place'));
    }

    public function view($id)
    {
        $types = TypeByTicket::where('ticket_id', $id)->get();
        $ticket = Ticket::find($id);
        $place_id = $types[0]->getPlaceId($types[0]->type_id);
        
        $place = Places::find($place_id);
        $geverment = Government::find($place->gov_id);
        $time = Eventdates::where('ticket_id', $id)->get();
        $time = $time[0];
        return view('admin.ticket.view', compact('ticket', 'types', 'place', 'geverment', 'time'));
    }

    public function update(Request $request, $id)
    {

        $ticket = Ticket::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/tickets/' . $ticket->image;

            if (File::exists($path)) {

                File::delete($path);
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/uploads/tickets/', $filename);
            $ticket->image = $filename;
        }
        $ticket->name = $request->input('name');
        $ticket->discription = $request->input('discription');


        $types = TypeByTicket::where('ticket_id', $id)->get();



        $dates = Eventdates::where('ticket_id', $id)->get();
        $dates = $dates[0];
        $dates->date = $request->input('date');
        $dates->time = $request->input('time');
        $dates->update();
        $ticket->update();

        $place_id = $types[0]->getPlaceId($types[0]->type_id);
        $place = Places::find($place_id);
        $som = 0;
        for ($i = 0; $i < count($types); $i++){
            $som += $request->input('quantity')[$i];
        }

        if ($som > $place->nbMax)

            return redirect(URL::previous())->with('error', " Quantity must be less than Maximal place number ");

        else {
            for ($i = 0; $i < count($types); $i++) {

                DB::table('type_by_ticket')->where('id', $types[$i]->id)->update([
                    'Price' => $request->input('price')[$i],
                    'quantity' => $request->input('quantity')[$i]
                ]);
            }

            
        }
        return redirect('tickets');
    }


    public function delete($id)
    {

        $ticket = Ticket::find($id);
        if ($ticket->image) {
            $path = 'assets/uploads/tickets/' . $ticket->image;
            if (File::exists($path)) {

                File::delete($path);
            }
        }
        $ticket->delete();
        return redirect('tickets');
    }
}
