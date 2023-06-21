<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PesanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function index()
    {
        $pesans = Pesan::All();

        return view('back.admin.pesan.index', compact('pesans'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => 'Isi :attribute harus diisi.',
            'email' => 'Isi :attribute dengan format email yang valid.',
            'numeric' => 'Isi :attribute dengan format angka.',
            'string' => 'Isi :attribute dengan format string.',
            'min' => 'Isi :attribute minimal 10 karakter karakter.',
            'max' => 'Isi :attribute maksimal :max karakter.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:6|max:20',
            'email' =>'required|string|email|min:6|max:50',
            'no_telp' => 'required|numeric|min:100000000',
            'judul' => 'required|string|min:10|max:256',
            'pesan' => 'required|string|min:10|max:255',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Pesan::create($request->all());

        Alert::success('sukses', 'Sukses Submit Saran !');
        return redirect()->route('front.contact');
    }

    public function show($id)
    {
        $pesans = Pesan::findOrFail($id);
        return view('back.admin.pesan.view', compact('pesans'));
    }
    public function destroy($id)
    {
        $data = Pesan::find($id);

        if($data->delete()){
            Alert::success('sukses', 'Sukses Hapus Data Pesan !');
            return redirect()->route('admin.pesan');
        } else {
            Alert::error('gagal', 'Gagal Hapus Data Pesan !');
            return redirect()->route('admin.pesan');
        } 
    }
}
