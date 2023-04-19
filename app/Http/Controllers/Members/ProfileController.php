<?php

namespace App\Http\Controllers\Members;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {
        return view('members.profile');
    }
}
