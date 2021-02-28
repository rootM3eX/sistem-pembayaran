@extends('layouts.dashboard.master')

@section('content')

    <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-8">

                <a href="{{ url('spp/show')}}" class="btn btn-success">Show Spp</a>

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
                  <form method="post" action="{{ url('spp/add/')}}">
                  @csrf
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Bulan</label>
                          <select class="form-control" name="bulan_id">
                            @foreach($bulan as $bl)
                                <option value="{{ $bl->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $bl->name }}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">User</label>
                          <select class="form-control" name="user_id">
                            @foreach($user as $u)
                                <option value="{{ $u->id }}" style="background-color:rgba(0,0,0,0.5)">{{ $u->name }}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="bmd-label-floating">Lunas</label>
                          <input type="text" class="form-control" name="is_lunas">
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Submit Profile</button>
                    <div class="clearfix"></div>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

@endsection