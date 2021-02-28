@extends('layouts.dashboard.master')

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
                <div class="col-md-8">
                    
                    <div class="card">
                    
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">{{ $title }}</h4>
                        </div>
                            <div class="card-body">
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
                            
                        <div class="table-responsive">
                            <table class="table">

                            <thead>
                                <tr>
                                @foreach($data as $hr)
                                    <th>
                                        @foreach($hr->buys as $jd)
                                        {{ $jd->bulan->name }}
                                        @endforeach
                                    </th>
                                @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                @foreach($data as $hr)
                                    <td>
                                    @foreach($hr->buys as $jd)
                                    <p>
                                        {{ $jd->user->name }} - {{ $jd->user->biodata_r->nisn }} : {{ $jd->is_lunas }}
                                    </p>
                                    @endforeach
                                    </td>
                                @endforeach
                                </tr>
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