<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $ticket =new Ticket();
        $users = new User();
        return view('admin.index',compact('ticket','users'));
    }
}
