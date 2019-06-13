@extends('admin.templates.default')

@section('content')
@include('admin.templates.partials._alerts')
<!-- Custom Tabs -->
<div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#tab_1" data-toggle="tab">Import murid</a></li>
          <li><a href="#tab_2" data-toggle="tab">Import guru</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="tab_1">
            <b>Cara penggunaan:</b>
            <p></p>
            <p>Silahkan download file excel <a href="{{Route('admin.xlsmurid')}}">disini</a> sebagai contoh dan untuk mengimport data siswa silahkan upload kembali file excel yang sudah di modifikasi.</p>
            <form action="{{Route('admin.importstoremurid')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="box-body">
            <div class="form-group">
                <input type="file" name="file" class="form-control">
            </div>
                <p>Untuk melihat keterangan daftar id sekolah<a href="{{Route('admin.export')}}"> download disini</a></p>
                <code>note: id sekolah terdapat pada kolom paling kiri</code>
            </div>
            <div class="box-footer">
            <button type="submit" class="btn btn-primary">import</button>
            </div>
            </form>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="tab_2">
                <b>Cara penggunaan:</b>
                <p></p>
                <p>Silahkan download file excel <a href="{{Route('admin.xlsguru')}}">disini</a> sebagai contoh dan untuk mengimport data guru silahkan upload kembali file excel yang sudah di modifikasi.</p>
                <form action="{{Route('admin.importstoreguru')}}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="box-body">
                <div class="form-group">
                    <input type="file" name="file" class="form-control">
                </div>
                    <p>Untuk melihat keterangan daftar id sekolah <a href="{{Route('admin.export')}}">download disini</a></p>
                    <code>note: id sekolah terdapat pada kolom paling kiri</code>
                </div>
                <div class="box-footer">
                <button type="submit" class="btn btn-primary">import</button>
                </div>
                </form>
          </div>

        </div>
        <!-- /.tab-content -->
      </div>
      <!-- nav-tabs-custom -->
@endsection
