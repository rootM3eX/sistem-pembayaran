<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Biodata;
use App\User;

class Biodata_controller extends Controller
{
    public function index()
    {
        $title = 'Lengkapi biodata';
        $dt = User::with('biodata_r')->where('id',\Auth::user()->id)->first();
        $cek = Biodata::where('user_id',\Auth::user()->id)->count();

        return view('dashboard.biodata.index',compact('title','dt','cek'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request,[
            'no_hp' => 'required',
            'alamat' => 'required',
            'kelas' => 'required'
        ]);
        
        $data['user_id'] = $id;
        $data['nisn'] = $request->nisn;
        $data['no_hp'] = $request->no_hp;
        $data['kelas'] = $request->kelas;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::insert($data);

        \Session::flash('sukses','Data Berhasil dimasukan');

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {  
        $this->validate($request,[
            'no_hp' => 'required',
            'alamat' => 'required',
            'kelas' => 'required'
        ]);

        $data['nisn'] = $request->nisn;
        $data['no_hp'] = $request->no_hp;
        $data['kelas'] = $request->kelas;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::where('user_id',$id)->update($data);

        \Session::flash('sukses','Data Berhasil di update');

        return redirect()->back();
    }

    public function show()
    {
        $title = 'List data siswa';
        $data = User::withCount('biodata_r')->whereNull('role')->orderBy('name','asc')->paginate(5);

        return view('dashboard.biodata.show',compact('title','data'));
    }

    public function edit($id)
    {
        $title = 'Edit data';
        $dt = User::find($id);

        return view('dashboard.biodata.edit',compact('title','dt'));
    }

    public function delete($id)
    {
        try {
            User::where('id',$id)->delete();

            \Session::flash('sukses','Data Berhasil di hapus');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    /*
    public function data_update(Request $request, $id)
    {
        try {
        //biodata
        $data['nisn'] = $request->nisn;
        $data['no_hp'] = $request->no_hp;
        $data['kelas'] = $request->kelas;
        $data['alamat'] = $request->alamat;
        $data['tempat_lahir'] = $request->tempat_lahir;
        $data['tanggal_lahir'] = $request->tanggal_lahir;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Biodata::where('user_id',$id)->update($data);

        //user
        $user['email'] = $request->email;
        $user['updated_at'] = date('Y-m-d H:i:s');

        User::where('id',$id)->update($user);

        \Session::flash('sukses','Data Berhasil di update');
        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }*/
}
