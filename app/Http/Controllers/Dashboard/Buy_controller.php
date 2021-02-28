<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Buy;
use App\Models\Bulan;
use App\User;

class Buy_controller extends Controller
{
    public function index()
    {
        $title = 'Add SPP';
        $bulan = Bulan::get();
        $user = User::whereNull('role')->get();

        return view('dashboard.buy.index',compact('title','user','bulan'));
    }

    public function store(Request $request)
    {
        try {
            $data['bulan_id'] = $request->bulan_id;
            $data['user_id'] = $request->user_id;
            $data['is_lunas'] = $request->is_lunas;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');

            Buy::insert($data);

            \Session::flash('sukses','Data berhasil disave');

        } catch (\Throwable $th) {
            \Session::flash('gagal',$th->getMessage());
        }

        return redirect()->back();
    }

    public function show()
    {
        $title = 'Data Pembayaran';
        $data = Bulan::get();

        return view('dashboard.buy.show',compact('title','data'));
    }

    public function siswa_show($id)
    {
        $data = User::where('id',$id)->get();
        $bulan = Bulan::get();
        $title = 'List pembayaran';

        return view('dashboard.siswa.show',compact('title','data','bulan'));
    }
}
