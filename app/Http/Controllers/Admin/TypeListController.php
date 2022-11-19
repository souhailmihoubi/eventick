<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Models\Places;
use App\Models\Ticket;
use App\Models\Government;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class TypeListController extends Controller
{
    public function index(Request $request)
    {

        $places     = DB::table('places')->get();
        // $types = DB::table('type')->where('place_id','4')->get();
        return view('admin.typelist.index', compact('places'));
    }


    public function show(Request $request, $idt, $id)
    {

        $places = Places::find($id);
        $ticket = Ticket::find($idt);
        $types = DB::table('type')->where('type.place_id', $id)->get();
        return view('admin.typelist.add', compact('types', 'places', 'ticket'));
    }



    public function insert(Request $request, $idt, $id)
    {
        $types = DB::table('type')->where('type.place_id', $id)->get();
        $price = $request->price;
        $quantity = $request->quantity;
        $ticket = Ticket::find($idt);
        $som = 0;
        for ($i = 0; $i < count($types); $i++) {
            $som += $request->input('quantity')[$i];
        }

        $place = Places::find($id);
        if ($som > $place->nbMax)

            return redirect(URL::previous())->with('error', " Quantity must be less than Maximal place number ");
        
        else {
            for ($i = 0; $i < count($price); $i++) {

                DB::table('type_by_ticket')->insert([
                    'type_id' => $types[$i]->id,
                    'ticket_id' => $idt,
                    'price' => $price[$i],
                    'quantity' => $quantity[$i],
                ]);
            }
        }

        return redirect('insert/ticket/' . $idt . '/place/' . $id . '/datetime');
    }
}
