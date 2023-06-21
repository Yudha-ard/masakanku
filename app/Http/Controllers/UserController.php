<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');    
    }
    public function index()
    {
        $users = User::orderby('id', 'ASC')->paginate(10);

        return view('back.admin.user.index', compact('users'));
    }

    public function create()
    {
        $users = User::All();
        return view('back.admin.user.add', compact('users'));
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
            'name' => 'required|string|min:5|max:20',
            'email' =>'required|string|email|unique:users,email|min:6|max:50',
            'password' => 'required|string',
            'is_admin' => 'required|string',
            'img_profile' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        if(isset($request->email) && !empty($request->email))
        {
            $email = $request->email; 
        }

        $imagePath = null;

        if ($request->hasFile('img_profile')) {
            $image = $request->file('img_profile');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/user/' . $imageName;
            Storage::disk('public')->putFileAs('images/user', $image, $imageName);
            $fileName = pathinfo($imagePath, PATHINFO_BASENAME);
        }

        $dataUser = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => $request->input('is_admin'),
            'img_profile' => $fileName,
        ]);

        if($dataUser) {
            Alert::success('sukses', 'Sukses Tambah Data User !');
            return redirect()->route('admin.user');
        }

        Alert::error('gagal', 'Gagal Tambah Data User !');
        return redirect()->route('admin.user');
        
    }

    public function edit($id)
    {
        $users = User::find($id);
        return view('back.admin.user.edit', compact('users'));
    }
    public function show($id)
    {
        $users = User::find($id);
        return view('back.admin.user.view', compact('users'));
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
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'img_profile' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], $messages);

        $users = User::find($id);

        if ($request->hasFile('img_profile')) {
            $image = $request->file('img_profile');
            $extension = $image->getClientOriginalExtension();
            $imageName = uniqid() . '_' . time() . '.' . $extension;
            $imagePath = 'images/user/' . $imageName;
            $image->storeAs('public/'. $imagePath);
            $fileName = $imageName;
        }

        $Pass = $users->password;
        $PassNew = $request->password;

        $users->name = $request->name;
        $users->email = $request->email;
        $users->is_admin = $request->is_admin;

        if ($PassNew !== $Pass) {
            $users->password = Hash::make($PassNew);
        }
        
        $oldImg = $users->img_profile;
        $users->img_profile = $imageName;

        $fileName = pathinfo($imageName, PATHINFO_BASENAME);
        $users->img_profile = $fileName;

        $users->save();

        if (!empty($oldImg)) {
            Storage::disk('public')->delete('images/user/' . $oldImg);
        }

        if($users) {
            Alert::success('sukses', 'Sukses Update Data User !');
            return redirect()->route('admin.user');
        }

        Alert::error('gagal', 'Gagal Update Data User !');
        return redirect()->route('admin.user');

    }

    public function destroy($id) {

        $data = user::find($id);

        if($data->delete()){
            Alert::success('sukses', 'Sukses Hapus Data User !');
            return redirect()->route('admin.user');
        } else {
            Alert::error('gagal', 'Gagal Update Data User !');
            return redirect()->route('admin.user');
        } 
        
    }

}
