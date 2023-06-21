<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Resep;
use App\Models\Kategori;
use App\Models\Pesan;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user()
    {
        //$users = User::All();
        //$reseps = Resep::All();
        //$kategoris = Kategori::All();
        Alert::success('sukses', 'Login Sukses !');
        return view('back.user.dashboard');
        //return (Auth::user()->is_admin);

    }

    public function admin()
    {
        $users = User::All();
        $reseps = Resep::All();
        $kategoris = Kategori::All();
        $pesans = Pesan::All();

        Alert::success('sukses', 'Login Sukses !');

        return view('back.admin.dashboard', compact(['users', 'reseps', 'kategoris', 'pesans']));
        //return (Auth::user()->is_admin);
    }
}
