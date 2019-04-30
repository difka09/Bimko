@extends('guru.templates.wtsidebar')
@section('content')

<div class="col col-xl-9 order-xl-2 col-lg-9 order-lg-2 col-md-12 order-md-1 col-sm-12 col-12">
    <div class="ui-block">
        <div class="ui-block-title">
            <h6 class="title">Recent File</h6>
            <input class="form-control" id="search" name="search" type="text" style="display: inline-block;text-align: center;margin-left:100px" placeholder="Cari File Di sini...">
            <div class="btn-group bootstrap-select form-control without-border">
                <select name="" id="" tabindex="-98" class="selectpicker form-control without-border">
                        <option value="LY">LAST YEAR (2016)</option>
                        <option value="LY">LAST YEAR (2016)</option>
                </select>
            </div>

        </div>

        <!-- Notification List -->
        <div id=contentku>
        <ul class="notification-list">
            @foreach ($files as $file)
            <li>
                <div class="author-thumb">
                    <img width="42px" height="42px" src="{{$file->user->getImage()}}" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">{{$file->user->name}}</a> telah mengupload file <a href="#" class="notification-link">{{$file->title}}{{substr(($file->file_2),-4)}}</a>
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
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
$('input').on('keyup', function(){
    // alert('hi');
    $value = $(this).val();

    $.ajax({
        type: 'get',
        url: urls[10],
        data:{'search':$value},
        success:function(data){
            $('#contentku').html(data);
            // console.log(data)

        }
    });
})
</script>

@endpush
