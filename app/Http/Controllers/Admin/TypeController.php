<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Places;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TypeController extends Controller
{
    public function index($id)
    {
        
        $places = Places::find($id);  
         return view('admin.type.index', compact('places'));
    }

    public function insert(Request $request,$id){


        $name = $request->name;

        for($i=0; $i < count($name);$i++){
            $datasave = [
                'place_id' => $id,
                'name' => $name[$i],
            ];
            DB::table('type')->insert($datasave);
        }
        
        return redirect('places');
    }

   /* public function insert(Request $request)
    {
        $type = new Type();

        $type->ticket_id = $request->input('ticket_id');
        $type->name = $request->input('name');
        $type->price = $request->input('price');
        $type->quantity = $request->input('quantity');
        $type->save();
        return redirect('/tickets')->with('status',"Types Added Successfully :) ");
    }*/
}


