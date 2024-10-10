<?php

namespace App\Http\Controllers;

use App\Models\CourAppel;
use App\Models\Utilisateur;
use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    public function index (){
        $coursAppels = CourAppel::with('tpi')->get();
        $users = Utilisateur::with('tpi')->get();

        return view('Utilisateur')->with('coursAppels', $coursAppels)->with('users', $users);
    }
    
    
}
