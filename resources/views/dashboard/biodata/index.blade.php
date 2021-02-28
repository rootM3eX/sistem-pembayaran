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
                @if($cek < 1)

                  <form method="post" action="{{ url('biodata/add/'.\Auth::user()->id)}}">
                  @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kelas</label>
                          <input type="text" class="form-control" name="kelas">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">No.HP</label>
                          <input type="text" class="form-control" name="no_hp">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">NISN</label>
                          <input type="text" class="form-control" name="nisn">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> ketik alamat disini.</label>
                            <textarea class="form-control" rows="5" name="alamat"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit Profile</button>
                    <div class="clearfix"></div>
                  </form>

                  @else

                  <form method="post" action="{{ url('biodata/update/'.\Auth::user()->id)}}">
                  @csrf
                  {{ method_field('PUT') }}
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Kelas</label>
                          <input type="text" class="form-control" name="kelas" value="{{ $dt->biodata_r->kelas }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">No.HP</label>
                          <input type="text" class="form-control" name="no_hp" value="{{ $dt->biodata_r->no_hp }}">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">NISN</label>
                          <input type="text" class="form-control" name="nisn" value="{{ $dt->biodata_r->nisn }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tempat lahir</label>
                          <input type="text" class="form-control" name="tempat_lahir" value="{{ $dt->biodata_r->tempat_lahir }}">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">Tanggal lahir</label>
                          <input type="date" class="form-control" name="tanggal_lahir" value="{{ date('Y-m-d',strtotime($dt->biodata_r->tanggal_lahir)) }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label>Alamat</label>
                          <div class="form-group">
                            <label class="bmd-label-floating"> ketik alamat disini.</label>
                            <textarea class="form-control" rows="5" name="alamat">{{ $dt->biodata_r->alamat }}</textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                  @endif

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection