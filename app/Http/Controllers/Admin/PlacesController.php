<?php

namespace App\Http\Controllers\Admin;

use App\Models\Places;
use App\Models\Government;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PlacesController extends Controller
{
    public function index()
    {
        $places = Places::all();

        return view('admin.places.index', compact('places'));
    }

    public function insert(Request $request)
    {
        $place = new Places();

        $place->gov_id = $request->input('gov_id');
        $place->name = $request->input('name');
        $place->nbMax = $request->input('nbMax');

        $place->save();

        return redirect('type/' . $place->id);
    }

    public function add()
    {
        $places = Places::all();
        $government = Government::all();

        return view('admin.places.add', compact('government'));
    }

    public function edit($id)
    {
        $places = Places::find($id);

        $types = DB::table('type')->where('type.place_id', $id)->get();
        return view('admin.places.edit', compact('places', 'types'));
    }

    public function update(Request $request, $id)
    {
        $places = Places::find($id);
        $places->name = $request->input('name');
        $places->nbMax = $request->input('nbMax');

        $types = DB::table('type')->where('type.place_id', $id)->get();
        $init = count($types);
        $extra = count($request->input('namet'));

        if($extra > $init){
            for($i=$init;$i<$extra;$i++)
            {
                DB::table('type')->insert([
                    'place_id' => $id,
                    'name' => $request->input('namet')[$i]
                ]);
            }
        }

        
        for ($i = 0; $i < $init; $i++) {

            DB::table('type')->where('id',$types[$i]->id)->update([
                'name' => $request->input('namet')[$i]
            ]);
        }


        DB::table('places')->where('id',$id)->update([
            'name' => $places->name,
            'nbMax' => $places->nbMax
        ]);

        return redirect('places');
    }


    public function delete($id)
    {

        $places = Places::find($id);
        $places->delete();
        return redirect('places');
    }

    public function search()
    {
        $search_text = $_GET['query'];
        $govs = Government::where('name','LIKE','%'.$search_text.'%')->get();

        $places = Places::where('gov_id',$govs[0]->id)->get();

        return view('admin.places.search',compact('govs','places')); 
    }
}
