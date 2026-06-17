<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        $layanans = Layanan::latest()->take(6)->get();
        
        return view('welcome', compact('layanans'));
    }
}