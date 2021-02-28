@extends('layouts.dashboard.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Edit Profile</h4>
                  <p class="card-category">Complete your profile</p>
                </div>

                @if(Session::has('sukses'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-check"></i> Sukses!</h4>
                    {{ Session::get('sukses') }}
                </div>
                @endif
 
                @if(Session::has('gagal'))
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Gagal!</h4>
                    {{ Session::get('gagal') }}
                </div>
                @endif

                <div class="card-body">
                    <div class="table-reponsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>action</th>
                                    <th>Name</th>
                                    <th>nisn</th>
                                    <th>Kelas</th>
                                    <th>no.hp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $e=>$dt)
                                <tr>
                                    <td>{{ $e+1 }}</td>
                                    <td>
                                        <a href="{{ url('biodata/edit/'.$dt->id)}}" class="btn btn-warning">Edit</a>
                                        <a href="{{ url('biodata/hapus/'.$dt->id)}}" class="btn btn-danger">Hapus</a>
                                    </td>
                                    <td>{{ $dt->name }}</td>
                                    <td>{{ $dt->biodata_r->nisn }}</td>
                                    <td>{{ $dt->biodata_r->kelas }}</td>
                                    <td>{{ $dt->biodata_r->no_hp }}</td>
                                </tr>
                                @endforeach
                                {{ $data->links() }}
                            </tbody>
                        </table>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection