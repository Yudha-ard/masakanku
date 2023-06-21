<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resep;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ResepController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }
    public function index()
    {
        $reseps = Resep::orderby('id', 'ASC')->paginate(10);

        return view('back.admin.resep.index', compact('reseps'));
    }

    public function create()
    {
        $kategoris = Kategori::All();
        return view('back.admin.resep.add', compact('kategoris'));
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
            'judul' => 'required|string|min:6|max:20',
            'deskripsi' =>'required|string|min:6|max:10000',
            'img_resep' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $imagePath = null;

        if ($request->hasFile('img_resep')) {
            $image = $request->file('img_resep');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/resep/' . $imageName;
            Storage::disk('public')->putFileAs('images/resep', $image, $imageName);
            $fileName = pathinfo($imagePath, PATHINFO_BASENAME);
        }

        $dataResep = Resep::create([
            'judul' => $request->input('judul'),
            'deskripsi' => $request->input('deskripsi'),
            'img_resep' => $fileName,
            'kategori_id' => $request->input('kategori_id'),
        ]);

        if($dataResep) {
            Alert::success('sukses', 'Sukses Tambah Data Resep!');
            return redirect()->route('admin.resep');
        }

        Alert::error('gagal', 'Gagal Tambah Data Resep !');
        return redirect()->route('admin.resep');
        
    }

    public function edit($id)
    {
        $reseps = Resep::findOrFail($id);
        $kategoris = Kategori::all();

        return view('back.admin.resep.edit', compact(['reseps', 'kategoris']));
    }
    public function show($id)
    {
        $reseps = Resep::find($id);
        return view('back.admin.resep.view', compact('reseps'));
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
            'judul' => 'required|string|min:6|max:20',
            'deskripsi' =>'required|string|min:6|max:10000',
            'img_resep' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'kategori_id' => 'required',
        ], $messages);

        $reseps = Resep::find($id);

        if ($request->hasFile('img_resep')) {
            $image = $request->file('img_resep');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/resep/' . $imageName;
            $image->storeAs('public/'. $imagePath);
            $fileName = $imageName;
        }

        $reseps->judul = $request->judul;
        $reseps->deskripsi = $request->deskripsi;
        $reseps->kategori_id = $request->kategori_id;

        $oldImg = $reseps->img_resep;
        $reseps->img_resep = $imageName;

        $fileName = pathinfo($imageName, PATHINFO_BASENAME);
        $reseps->img_resep = $fileName;

        $reseps->save();

        if (!empty($oldImg)) {
            Storage::disk('public')->delete('images/resep/' . $oldImg);
        }

        if($reseps) {
            Alert::success('sukses', 'Sukses Update Data Resep !');
            return redirect()->route('admin.resep');
        }

        Alert::error('gagal', 'Gagal Update Data Resep !');
        return redirect()->route('admin.resep');

    }

    public function destroy($id) {

        $data = Resep::find($id);

        if($data->delete()){
            Alert::success('sukses', 'Sukses Hapus Data Resep !');
            return redirect()->route('admin.resep');
        } else {
            Alert::error('gagal', 'Gagal Hapus Data Resep !');
            return redirect()->route('admin.resep');
        } 
        
    }

}
