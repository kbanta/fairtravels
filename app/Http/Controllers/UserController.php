<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['role:user']);
    }
    public function index()
    {
        $notifications = Auth::user()->notifications;
        return view('landing_page', [
            'notifications' => $notifications
        ]);
    }
}
