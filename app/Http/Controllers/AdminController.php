<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.index');
    }

    public function ShowUsers()
    {
        $users = User::all();
        return view('admin.users.index')->with('users',$users);
    }

    public function DestroyUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('flash_message_error','User Deleted');
    }
}
