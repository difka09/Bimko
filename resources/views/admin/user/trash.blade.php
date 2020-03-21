@foreach ($users as $user)
<div id="yourModal{{$user->id}}" class="modal fade" role="dialog" aria-labelledby="myModalLabel" style="display:none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Detail Data</h4>
            </div>
                <div class="modal-body">
                        <div class="row" style="padding-left:20px;padding-right:20px">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label for="">Nama</label>
                                <input type="text" class="form-control" name="name" value="{{ucwords($user->name)}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left:20px;padding-right:20px">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{$user->email}}" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="padding-left:20px;padding-right:20px">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                @if ($user->nis != 0)
                                <label for="">NIS</label>
                                <input type="text" class="form-control" name="nis" value="{{$user->nis}}" disabled>
                                @endif
                                @if ($user->nip != 0)
                                <label for="">NIP</label>
                                <input type="text" class="form-control" name="nip" value="{{$user->nip}}" disabled>
                                @endif
                                </div>
                            </div>
                        </div>
                        @if($user->grade != null)
                        <div class="row" style="padding-left:20px;padding-right:20px">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label for="">Kelas</label>
                                    <input type="text" class="form-control" name="grade" value="{{$user->grade}}" disabled>
                                </div>
                            </div>
                        </div>
                        @endif
                        @if($user->phone != null)
                        <div class="row" style="padding-left:20px;padding-right:20px">
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                <label for="">Nomor HP</label>
                                <input type="text" class="form-control" name="phone" value="{{$user->phone}}" disabled>
                                </div>
                            </div>
                        </div>
                        @endif
                    <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@extends('admin.templates.default')
@section('content')
@include('admin.templates.partials._alerts')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Trash Semua Data User</h3>
            </div>
            <div class="box-body">
                {{-- <a href="{{ route('user.index') }}" class="btn btn-primary">Data User</a> --}}
                @if($users->count() != 0)
                <a href="{{ route('user.restoreall') }}" class="btn btn-primary">Restore All</a>
                @endif
                <table class="table table-bordered">
                    <tr>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                    @if($users->count() == 0)
                    data trash kosong
                    @endif
                   @foreach ($users as $user)
                   <tr>
                        <td>{{ ucwords($user->name) }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        @if ($user->isGuru())
                        <td><span class="label label-info">Guru</span></td>
                        @endif
                        @if ($user->isGuest())
                        <td><span class="label label-success">Responder</span></td>
                        @endif
                        @if ($user->isMurid())
                        <td><span class="label label-default">Murid</span></td>
                        @endif
                        <td>
                            <button type="button" data-toggle="modal" class="btn btn-success" data-target="#yourModal{{$user->id}}"><i class="fa fa-eye"></i> lihat</button>
                            {{-- <button type="button" data-toggle="modal" class="btn btn-success" data-target="#yourModal" value="{{ route('user.trash.show', $user->id) }}"><i class="fa fa-eye"></i> lihat</button> --}}
                            <a href="{{ route('user.restore', $user->id) }}" class="btn btn-success">Restore</a>
                            <a href="{{ route('user.destroypermanent', $user->id) }}"  class="btn btn-danger">Hapus</a>
                            {{-- <button id="delete" data-title="{{ $user->name }}" href="{{route('user.restore',$user) }}" class="btn btn-success">Restore</i></button>
                            <button id="reset" data-title="{{ $user->name }}" href="{{route('user.reset',$user) }}" class="btn btn-danger">Hapus Permanen</button> --}}
                        </td>
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
@push('scripts')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
