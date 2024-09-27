<?php

namespace App\Http\Controllers;

use App\Http\Middleware\SuperAdminMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(SuperAdminMiddleware::class);  // Appliquer le middleware directement ici
    }
    public function index(){
        // dd(Auth::user()); 
        return view('superAdmin');
    }
}
