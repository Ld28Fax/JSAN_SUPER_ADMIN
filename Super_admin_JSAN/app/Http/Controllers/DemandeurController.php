<?php

namespace App\Http\Controllers;

use App\Models\Demandeur;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DemandeurController extends Controller
{
    public function index()
    {
        return view('demandeurs.index');
    }

    public function liste(){
        try{
            $demandeurs = DB::table('demandeur')->get();
            return view('demandeurs.liste')->with('demandeurs', $demandeurs);
        } 
        catch (Exception $e){
            return redirect()->back()->withErrors("error", $e->getMessage());
        }
    }
    public function exportation(){
        try{
            $demandeurs = DB::table('demandeur')->get();

            return view('demandeurs.exportation')->with('demandeurs', $demandeurs);
        } 
        catch (Exception $e){
            return redirect()->back()->withErrors("error", $e->getMessage());
        }
    }

    public function actif($id){
        try{
            Demandeur::Activer($id);
            return redirect()->back();
        }catch(Exception $e){
            throw new Exception($e->getMessage());
        }
    }

    public function filtrerStatistiques(Request $request)
    {
        $debut_jour = $request->input('debut_jour');
        $debut_mois = $request->input('debut_mois');
        $fin_jour = $request->input('fin_jour');
        $fin_mois = $request->input('fin_mois');
    
        $debut = Carbon::create(null, $debut_mois, $debut_jour);
        $fin = Carbon::create(null, $fin_mois, $fin_jour)->endOfDay();
    
        $nombreDemandeursPeriode = DB::table('demandeur')
            ->whereBetween('created_at', [$debut, $fin])
            ->count();
        
        $nombreDemandeursActifPeriode = DB::table('demandeur')
            ->where('etat', '=', 1)
            ->whereBetween('created_at', [$debut, $fin])
            ->count();
            
        $nombreDemandeursInactifPeriode = DB::table('demandeur')
            ->where('etat', '=', 0)
            ->whereBetween('created_at', [$debut, $fin])
            ->count();
            
        $nombreDemandeursRefuséPeriode = DB::table('demandeur')
            ->where('etat', '=', 2)
            ->whereBetween('created_at', [$debut, $fin])
            ->count();
    
    
        $nombreDemandeurs = DB::table('demandeur')->count();           
        
        $nombreDemandeursActif = DB::table('demandeur')->where('etat', '=', 1)->count();
        
        $nombreDemandeursInactif = DB::table('demandeur')->where('etat', '=', 0)->count();
        
        $nombreDemandeursRefusé = DB::table('demandeur')->where('etat', '=', 2)->count();

    
        return view('demandeurs.statistique')
        ->with('nombreDemandeursPeriode', $nombreDemandeursPeriode)
        ->with('nombreDemandeursActifPeriode', $nombreDemandeursActifPeriode)
        ->with('nombreDemandeursInactifPeriode', $nombreDemandeursInactifPeriode)
        ->with('nombreDemandeursRefuséPeriode', $nombreDemandeursRefuséPeriode)
        ->with('debut_jour', $debut_jour)
        ->with('debut_mois', $debut_mois)
        ->with('fin_jour', $fin_jour)
        ->with('fin_mois', $fin_mois)
        ->with('nombreDemandeurs', $nombreDemandeurs)
        ->with('nombreDemandeursActif', $nombreDemandeursActif)
        ->with('nombreDemandeursInactif', $nombreDemandeursInactif)
        ->with('nombreDemandeursRefusé', $nombreDemandeursRefusé);
    }

}