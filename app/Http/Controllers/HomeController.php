<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{

    public function index():View
    {
        return view('home');
    }

    public function show(): View
    {
        $users = [
            ['nom' => 'Dubois', 'prenom' => 'Charles'],
            ['nom' => 'Gautier', 'prenom' => 'Paul'],
            ['nom' => 'Boutier', 'prenom' => 'Benoit'],
            ['nom' => 'Murail', 'prenom' => 'Pierre'],
            ['nom' => 'Meunier', 'prenom' => 'Louis'],
        ];
        return view('users', ['users' => $users]);
    }



    public function makeForm(): View
    {
        return view('contact');
    }

    public function store(ContactFormRequest $request): View
    {
        dd($request->validated());
    }

}
