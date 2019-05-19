@extends('admin.templates.default')
@foreach ($users as $user)
@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data <?php echo  $user['roleName']; ?></h3>
            </div>
            <div class="box-body">
            <a href="{{ route('user.guru.create') }}" class=" {{ request()->is('admin/guru') ? '' : 'hidden' }} btn btn-primary">Tambah <?php echo  $user['roleName']; ?></a>
            <a href="{{ route('user.murid.create') }}" class=" {{ request()->is('admin/murid') ? '' : 'hidden' }} btn btn-primary">Tambah <?php echo  $user['roleName']; ?></a>
            <a href="{{ route('user.guest.create') }}" class=" {{ request()->is('admin/guest') ? '' : 'hidden' }} btn btn-primary">Tambah <?php echo  $user['roleName']; ?></a>

                <table class="table table-bordered">
                    <tr>
                        <th style="width:15px">No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                   @foreach ($users as $index => $user)
                   <tr>
                       {{-- <td>#</td> --}}
                        <td>{{ $index + $users->firstItem() }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @if ($user->roleName != 'guest')
                            <a href="{{ route('user.edit', $user) }}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                            @else
                            @endif
                            <button id="delete" data-title="{{ $user->name }}" href="{{route('user.destroy',$user) }}" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                            <button id="reset" data-title="{{ $user->name }}" href="{{route('user.reset',$user) }}" class="btn btn-danger">reset</button>
                        </td>
                        <form id="deleteForm" method="post">
                            @csrf
                            @method("DELETE")
                            <input type="submit" value="" style="display:none">
                        </form>
                        <form id="resetForm" method="post">
                            @csrf
                            @method("PUT")
                            <input type="hidden" name="password" class="form-control" value="12345678" placeholder="min 8 karakter">
                            <input type="submit" value="" style="display:none">
                        </form>
                    </tr>
                   @endforeach
                </table>
            </div>
            <div class="box-footer clearfix">
                {{ $users->links('vendor.pagination.adminlte') }}
            </div>
        </div>
    </div>
</div>
@endsection
@endforeach
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>
    $('button#delete').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');
        swal({
            title: "Apakah kamu yakin akan hapus user "+ title +" ?",
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
    $('button#reset').on('click', function(){
        var href = $(this).attr('href');
        var title = $(this).data('title');
        swal({
            title: "Apakah kamu yakin akan reset password user "+ title +" ?",
            buttons: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                document.getElementById('resetForm').action = href;
                document.getElementById('resetForm').submit();
                swal("Password berhasil direset", {
                icon: "success",
                });
            }
        });
        });
</script>
@endpush
