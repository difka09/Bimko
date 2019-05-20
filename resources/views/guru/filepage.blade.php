@extends('guru.templates.wtsidebar')
@push('customecss')
<style>
input[type="text"] {
    width: 440px;
    height: 20px;
    text-align: center;
    margin-left:100px;
}
button{
    width: 100px;
    height: 35px;
    margin-top: 4px;
    margin-right: 2px;
    background-color:steelblue

}
</style>

@endpush
@section('pageTitle', 'Data File')
@section('content')
<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
<div class="ui-block">
    {{-- <form action="{{url()->current()}}"> --}}
    <form action="{{route('guru.filepage')}}" method="GET">
        <div class="ui-block-title">
            <h6 class="title">Kumpulan File</h6>
            <input class="form-control" id="cari" name="cari" type="text" style="width: 80%" placeholder="Cari File Di sini..." >
            <button type="submit" class="btn btn-sm" style="margin-left: 12%">cari</button>
            {{-- <a href="{{route('guru.filepage')}}?title=gdx">a</a> --}}
            <div class="btn-group bootstrap-select form-control without-border">
                <select name="dropdownList" id="dropdownList" tabindex="-98" class="selectpicker form-control without-border" onchange="location=this.value;">
                        <option value="#" selected>Urutkan</option>
                        <option value="{{route('guru.filepage', ['cari' => request('cari'), 'sort' => 'desc'])}}">Terbaru</option>
                        <option value="{{route('guru.filepage', ['cari' => request('cari'), 'sort' => 'asc'])}}">Terlama</option>
                        <option value="{{route('guru.filepage', ['cari' => request('cari'), 'abjad' => 'asc'])}}">Abjad</option>

                </select>
            </div>

        </div>
    </form>
    <div class="ui-block-content">
        <!-- Notification List -->
    <div id=contentku>
        <ul class="notification-list">
            @if ($files->count() == 0)
            <li>
                <a>File tidak ditemukan</a>
            </li>
            @endif
            @foreach ($files as $file)
            <li>
                <div class="author-thumb" id="author-thumb" style="width:42px;height:42px;">
                    <img width="42px" height="42px" style="max-height: 42px;max-width: 42px" src="{{$file->user->getImage()}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="{{route('guru.profil',$file->user->id)}}" class="h6 notification-friend">{{$file->user->name}}</a> telah mengupload file <a href="{{route('guru.show',$file)}}" class="notification-link">{{$file->file_3}}</a>
                    <span class="notification-date"><time class="entry-date updated" datetime="{{$file->created_at}}"></time></span>
                </div>
                <span class="notification-icon">
                    <a href="{{route('guru.show',$file)}}" class="btn btn-blue btn-sm">Lihat</a>
                    <a href="{{route('guru.download',$file)}}" class="btn btn-green btn-sm">Download</a>
                </span>
            </li>
            @endforeach
        </ul>

    </div>
        <!-- ... end Notification List -->
    </div>

    <div style="position:fixed">
            {{ $files->links() }}
    </div>

</div>



    <!-- Pagination -->
    {{-- <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1<div class="ripple-container"><div class="ripple ripple-on ripple-out" style="left: -10.3833px; top: -16.8333px; background-color: rgb(255, 255, 255); transform: scale(16.7857);"></div></div></a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item"><a class="page-link" href="#">...</a></li>
            <li class="page-item"><a class="page-link" href="#">12</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav> --}}
    <!-- ... end Pagination -->

</div>




@endsection
@push('scripts')

<script>
var selectedItem = sessionStorage.getItem("dropdownList");
$('#dropdownList').val(selectedItem);

$('#dropdownList').change(function() {
    var dropVal = $(this).val();
    sessionStorage.setItem("dropdownList", dropVal);
});

</script>


@endpush
