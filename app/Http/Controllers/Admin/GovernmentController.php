<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Government;
use Illuminate\Http\Request;

class GovernmentController extends Controller
{
    public function index()
    {
        $government = Government::all();
        return view('admin.government.index',compact('government'));
    }

    public function add()
    {
        return view('admin.government.add');
    }

    public function insert(Request $request)
    {
        $government = new Government();
    
        $government->name = $request->input('name');
        $government->save();
        return redirect('/government')
        ;
    }

    public function edit($id)
    {
        $government = Government::find($id);
        return view('admin.government.edit', compact('government'));
    }

    public function update(Request $request, $id)
    {
        $government = Government::find($id);
        $government->name = $request->input('name');
        $government->update();
        return redirect('/dashboard');
    }

    public function destroy($id)
    {
        $government = Government::find($id);
        $government->delete();
        return redirect('/categories');
    }

}
