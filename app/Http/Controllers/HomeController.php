<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Layanan;

class HomeController extends Controller
{
    public function index()
    {
        // Kode ini aman digunakan baik untuk tampilan statis maupun dinamis
        // Jika welcome.blade.php kamu masih statis, variabel ini hanya akan diabaikan tanpa menyebabkan error
        $layanans = Layanan::latest()->take(6)->get();
        
        return view('welcome', compact('layanans'));
    }
}