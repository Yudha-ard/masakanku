<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }
    public function index()
    {
        $kategoris = Kategori::orderby('id', 'ASC')->paginate(10);

        return view('back.admin.kategori.index', compact('kategoris'));
    }

    public function create()
    {
        return view('back.admin.kategori.add');
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
            'nama' => 'required|string|min:6|max:20',
            'img_kategori' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' =>'required|string|min:6|max:50',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $imagePath = null;

        if ($request->hasFile('img_kategori')) {
            $image = $request->file('img_kategori');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/kategori/' . $imageName;
            Storage::disk('public')->putFileAs('images/kategori', $image, $imageName);
            $fileName = pathinfo($imagePath, PATHINFO_BASENAME);
        }

        $dataKategori = Kategori::create([
            'nama' => $request->input('nama'),
            'img_kategori' => $fileName,
            'deskripsi' => $request->input('deskripsi'),
        ]);

        if($dataKategori) {
            Alert::success('sukses', 'Berhasil Menambahkan Data Kategori !');
            return redirect()->route('admin.kategori');
        }

        Alert::error('gagal', 'Gagal Menambahkan Data Kategori !');
        return redirect()->route('admin.kategori');
        
    }

    public function edit($id)
    {
        $kategoris = Kategori::findOrFail($id);

        return view('back.admin.kategori.edit', compact('kategoris'));
    }
    public function show($id)
    {
        $kategoris = Kategori::findOrFail($id);
        return view('back.admin.kategori.view', compact('kategoris'));
    }

    public function update(Request $request, $id)
    {
        $messages = [
            'required' => 'Isi :attribute harus diisi.',
            'email' => 'Isi :attribute dengan format email yang valid.',
            'numeric' => 'Isi :attribute dengan format angka.',
            'string' => 'Isi :attribute dengan format string.',
            'min' => 'Isi :attribute minimal :min karakter.',
            'max' => 'Isi :attribute maksimal :max karakter.',
        ];

        $request->validate([
            'nama' => 'required|string|min:6|max:20',
            'img_kategori' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi' =>'required|string|min:6|max:50',
        ], $messages);

        $kategoris = Kategori::findOrFail($id);

        if ($request->hasFile('img_kategori')) {
            $image = $request->file('img_kategori');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/kategori/' . $imageName;
            $image->storeAs('public/'. $imagePath);
            $fileName = $imageName;
        }

        $kategoris->nama = $request->nama;
        $kategoris->deskripsi = $request->deskripsi;

        $oldImg = $kategoris->img_kategori;
        $kategoris->img_kategori = $imageName;

        $fileName = pathinfo($imageName, PATHINFO_BASENAME);
        $kategoris->img_kategori = $fileName;

        $kategoris->save();

        if (!empty($oldImg)) {
            Storage::disk('public')->delete('images/kategori/' . $oldImg);
        }

        if($kategoris) {
            Alert::success('sukses', 'Sukses Update Data Kategori!');
            return redirect()->route('admin.kategori');
        }

        Alert::error('gagal', 'Gagal Update Data Kategori !');
        return redirect()->route('admin.kategori');

    }

    public function destroy($id) {

        $data = Kategori::find($id);

        if ($data->resep()->exists()) {
            Alert::info('info', 'Data Tidak Bisa Dihapus !');
            return redirect()->back();
        }

        if($data->delete()){
            Alert::success('sukses', 'Sukses Hapus Data Kategori!');
            return redirect()->route('admin.kategori');
        } else {
            Alert::error('gagal', 'Gagal Hapus Data Kategori!');
            return redirect()->route('admin.kategori');
        } 
        
    }

}
