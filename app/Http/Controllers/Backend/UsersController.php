<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use ErrorException;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Storage;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Users';
        $data =User::all();
        return view ('backend.users.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Users';
        return view ('backend.users.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);
    
        $user = new User;
        $user ->name = $request->name;
        $user->role = $request->role;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // Menghasilkan hash dari kata sandi
        $user->save();
    
        // Selanjutnya, lakukan sesuatu dengan user yang baru saja dibuat
    
        return redirect('/users')->with('success', 'User telah berhasil ditambahkan');
    
    }

    
    // {
    //     if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
    //         try {
    //             // $image = $request->file('gambar');
    //             // $nama = time() . "_" . $image->getClientOriginalName();
    //             // $tujuan_upload = public_path().'\images\users';
    //             // $image->move($tujuan_upload, $nama);
    //             // $requestData["photo"]= '/storage'.$nama;
    //             $users = new users;
    //             $users->name = $request->input('name');
    //             $users->email = $request->input('email');
    //             $users->password = $request->input('password');
    //             $users->role = $request->input('role');
                
    //             $users->save();
                
    //             Session::flash('success', 'Data user Berhasil ditambah!');
    //             return redirect('/users');
    //             // return $slide;
    //         } catch (Exception $e) {
    //             throw new Exception($e->getMessage());
    //         }
    //     } else {
    //         return "Upsss gagal";
    //     }

    // }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Users';
        $data = User::whereId($id)->first();
        // return view('backend.users.edit')->with('title', $data);
        return view ('backend.users.edit',compact('title','data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = $request->password;
        $data->role = $request->role;
        $data->save();

        Session::flash('success', 'Data Users Berhasil diubah!');
        return redirect('/users');
    }
        // if ($request->hasFile('gambar') && $request->file('gambar')->isValid()) {
        //     try {
        //         // $image = $request->file('gambar');
        //         // $nama = time() . "_" . $image->getClientOriginalName();
        //         // $tujuan_upload = public_path().'\images\users';
        //         // $image->move($tujuan_upload, $nama);
        
        //         // Ambil data yang akan diupdate
        //         $users = users::find($id);
        
        //         // Cek jika data ada
        //         if (!$users) {
        //             return redirect('/users')->with('error', 'User tidak ditemukan');
        //         }
        
        //         // Hapus gambar lama jika ada
        //         // if ($user->gambar) {
        //         //     Storage::delete('public/images/users/' . $user->gambar);
        //         // }
        
        //         // Update data slide
        //         $user->name = $request->input('name');
        //         $users->email = $request->input('email');
        //         $users->password = $request->input('password');
        //         $users->role = $request->input('role');

        //         $user->save();
        
        //         Session::flash('success', 'Data Slide Berhasil diubah!');
        //         return redirect('/users');
        //     } catch (Exception $e) {
        //         throw new Exception($e->getMessage());
        //     }
        // } else {
        //     return "Ubah foto Anda ke file PNG";
        // }
        
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data ->delete();
        return redirect ('/users');
    }
}
