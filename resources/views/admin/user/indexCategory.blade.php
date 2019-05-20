@extends('admin.templates.default')
@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Kategori</h3>
            </div>
            <div class="box-body">
           <a href="{{ route('user.category.create') }}" class="btn btn-primary">Tambah Kategori</a>

                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Nama</th>
                        <th>Action</th>
                    </tr>
                   @foreach ($categories as $index => $category)
                   <tr>
                       {{-- <td>#</td> --}}
                        <td>{{ $index + $categories->firstItem() }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            <button id="delete" data-title="{{ $category->name }}" href="{{route('category.destroy',$category) }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                        </td>
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
                {{ $categories->links('vendor.pagination.adminlte') }}
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
            title: "Apakah kamu yakin akan hapus kategori "+ title +" ?",
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
@endpush
