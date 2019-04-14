@extends('admin.templates.default')
{{-- @foreach ($users as $user) --}}
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Data</h3>
                </div>
                <div class="box-body">
                    Data kosong atau data belum diisi, Klik  <a href="{{ route('user.murid.create') }}" class=" {{ request()->is('admin/murid') ? '' : 'hidden' }}">Tambah Data</a> <a href="{{ route('user.guru.create') }}" class=" {{ request()->is('admin/guru') ? '' : 'hidden' }} ">Tambah Data</a> untuk menambahkan data
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @endforeach --}}

