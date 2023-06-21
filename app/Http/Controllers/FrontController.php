<?php

namespace App\Http\Controllers;

use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class FrontController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['recipe','showRecipe']);
    }
    public function index() {
        return view('front.app.index');
    }
    public function about() {
        return view('front.app.about');
    }
    public function recipe() {
        $reseps = Resep::All();
        Alert::success('sukses', 'Login Sukses !');
        return view('front.app.recipe', compact('reseps'));
    }
    public function showRecipe($id) {

        $reseps = Resep::findOrFail($id);
        return view('front.app.details', compact('reseps'));
    }
    public function contact() {
        return view('front.app.contact');
    }
}
