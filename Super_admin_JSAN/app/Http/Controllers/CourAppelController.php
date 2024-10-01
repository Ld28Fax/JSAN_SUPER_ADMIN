<?php

namespace App\Http\Controllers;

use App\Models\CourAppel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CourAppelController extends Controller
{
    public function index (){
        $coursAppels = CourAppel::with('tpi')->get();
        return view('Utilisateur')->with('coursAppels', $coursAppels);
    }

    public function utilisateur($id){
        $Tpi = DB::table('tpi')->get()->where('cour_appel_id', '=', $id);
        $coursAppels = CourAppel::with('tpi')->get();
        return view('UtilisateurTpi')->with('Tpi', $Tpi)->with('coursAppels', $coursAppels);
    }
}
