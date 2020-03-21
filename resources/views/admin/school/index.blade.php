@extends('admin.templates.default')
@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Sekolah</h3>
            </div>
            <div class="box-body">
            <a href="{{ route('school.create') }}" class="btn btn-primary">Tambah Sekolah</a>
                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th style="witdth:300px">Nama</th>
                        <th style ="width:300px">Alamat</th>
                        <th>Gambar</th>
                        <th style ="width:300px">Deskripsi </th>
                        <th>Aksi</th>
                    </tr>
                   @foreach ($schools as $index => $school)
                   <tr>
                        <td>{{ $index + $schools->firstItem() }}</td>
                        <td>{{ $school->name }}</td>
                        <td>{{ $school->address }}</td>
                        <td>
                            <img src="{{ $school->getImage() }}" alt="" width="100">
                        </td>
                        <td>{{str_limit($school->description,100) }}</td>
                        <td><center>
                           <a href="{{ route('school.edit', $school) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                           <button id="delete" data-title="{{ $school->name }}" href="{{route('school.destroy',$school) }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </center></td>
                        <form id="deleteForm" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="" style="display:none">
                        </form>
                    </tr>
                   @endforeach
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $schools->links('vendor.pagination.adminlte') }}
            </div>
        </div>
                <div class="panel panel-primary">
                        <div class="panel-heading">Maps</div>
                        <div class="panel-body no-padding">
                         <div id="map"></div>
                     </div>
                </div>
    </div>
</div>
@endsection
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('button#delete').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');
        swal({
            title: "Apakah kamu yakin akan hapus sekolah "+ title +" ?",
            text: "Jika menghapus data ini, data akan hilang!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                document.getElementById('deleteForm').action = href;
                document.getElementById('deleteForm').submit();
                swal("Data telah terhapus", {
                icon: "success",
                });
            }
        });
    });
</script>

<script>
        var map = new GMaps({
          el: '#map',
          zoom: 12,
          lat: -6.9611102,
          lng: 111.4038343
      });

        @foreach($schools as $school)
        map.addMarker({
            lat: '{{$school->latitude}}',
            lng: '{{$school->longitude}}',
            title: '{{$school->name}}',
            icon: '{{ asset('images/maps/school-icon.ico') }}',
            infoWindow: {
                content : '<h3>{{$school->name}}</h3><p>{{$school->description}}</p>'
            }
        });
        @endforeach
</script>
@endpush
