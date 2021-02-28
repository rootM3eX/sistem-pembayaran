<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Bulan;

class Bulan_controller extends Controller
{
    public function index()
    {
        $title = 'Add bulan';

        return view('dashboard.bulan.index',compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ]);
        
        $data['name'] = $request->name;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Bulan::insert($data);

        \Session::flash('sukses','Data Berhasil dimasukan');

        return redirect()->back();
    }

}
