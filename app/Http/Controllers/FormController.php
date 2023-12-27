<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class FormController extends Controller
{
    public function formUser(): View
    {
        return view('userForm');
    }

    public function formPost(): View
    {
        return view('postForm');
    }
}
