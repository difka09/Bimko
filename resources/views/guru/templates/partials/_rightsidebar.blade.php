<aside class="col col-xl-3 order-xl-3 col-lg-6 order-lg-3 col-md-6 col-sm-12 col-12">

<div class="ui-block">
    <div class="widget w-birthday-alert">
        <div class="icons-block">
            <a data-target="#create-event" data-toggle="modal" class="more"><svg class="olymp-calendar-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use></svg></a>
        </div>
        <div class="content">
            <div class="author-thumb">
                <img src="{{asset('guru/img/badge13.png')}}" alt="author">
            </div>
            <span>{{$day}}</span>
            <a href="#" class="h4 title">{{$name}}</a>
            {{-- <p>Klik Disini untuk mel</p> --}}
            <a style="color:white;font-weight: bold;" href="{{Route('guru.indexagenda')}}"><p>Informasi Rapat Lainnya >></p></a>
        </div>
    </div>
</div>

<div class="ui-block">
    <div class="custome-title">
    <a href="{{route('guru.filepage')}}">
    <div class="ui-block-title">
        <h6 class="title">Recent File Upload</h6>
        <a href="{{route('guru.filepage')}}" class="more btn"><svg class="olymp-blog-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-blog-icon')}}"></use></svg></a>
    </div>
    </a>
    </div>
    <!-- W-Activity-Feed -->
    <ul class="widget w-activity-feed notification-list">
        @foreach ($files as $file)
        <li>
            <div class="author-thumb">
                <img src="{{$file->user->getImage()}}" alt="author">
            </div>
            <div class="notification-event">
                <a href="#" class="h6 notification-friend">{{$file->user->name}}</a> telah mengupload file <a href="#" class="notification-link">{{$file->title}}{{substr(($file->file_2),-4)}}</a>
                <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">2 mins ago</time></span>
            </div>
        </li>
        @endforeach
    </ul>
    <!-- .. end W-Activity-Feed -->
</div>

<div class="modal fade show" id="create-event" tabindex="-1" role="dialog" aria-labelledby="create-event" style="display:none; padding-right: 17px;">
        <div class="modal-dialog window-popup create-event" role="document">
            <div class="modal-content">
                <a href="#" class="close icon-close" data-dismiss="modal" aria-label="Close">
                <svg class="olymp-close-icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-close-icon')}}"></use></svg>
                </a>
            <div class="modal-header">
                <h6 class="title">Create an Event</h6>
            </div>
            <div class="modal-body">
                <form action="{{Route('guru.addagenda')}}" method="POST">
                    @csrf
                <div class="form-group label-floating is-select is-empty">
                    <label class="control-label">Personal Event</label>
                    <div class="btn-group bootstrap-select form-control">
                    <select class="selectpicker form-control" tabindex="-98">
                        <option value="MA">Private Event</option>
                        <option value="FE">Personal Event</option>
                    </select>
                </div>
                    <span class="material-input"></span>
                </div>

                <div class="form-group label-floating">
                    <label class="control-label">Nama Rapat</label>
                    <input class="form-control" placeholder="" type="text" name="name" required>
                    <span class="material-input"></span></div>
                <div class="form-group label-floating is-empty">
                    <label class="control-label">Tempat</label>
                    <input class="form-control" placeholder="" value="" type="text" name="place" required>
                    <span class="material-input"></span></div>
                <div class="form-group date-time-picker label-floating is-focused">
                    <label class="control-label">Tanggal</label>
                    <input name="date" type="date" required>
                    {{-- <span class="input-group-addon">
                    <svg class="olymp-calendar-icon icon"><use xlink:href="{{asset('guru/svg-icons/sprites/icons.svg#olymp-calendar-icon')}}"></use></svg>
                    </span> --}}
                </div>

                <div class="row">

                <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group label-floating is-focused" >
                    <label class="control-label">Waktu</label>
                    <input class="form-control" placeholder="" type="time" name="time" style="width: 120px" required>
                    <span class="material-input"></span>
                </div>
                </div>

                {{-- <div class="col col-lg-3 col-md-3 col-sm-12 col-12">
                <div class="form-group label-floating is-select">
                    <label class="control-label">AM-PM</label>
                    <div class="btn-group bootstrap-select form-control">
                    <select class="selectpicker form-control" tabindex="-98">
                        <option value="MA">AM</option>
                        <option value="FE">PM</option>
                    </select>
                    </div>
                    <span class="material-input"></span>
                </div>
                </div> --}}

                {{-- <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="form-group label-floating is-select">
                    <label class="control-label">Timezone</label>
                    <div class="btn-group bootstrap-select form-control">
                    <select class="selectpicker form-control" tabindex="-98">
                        <option value="MA">US (UTC-8)</option>
                        <option value="FE">UK (UTC-0)</option>
                    </select>
                    </div>
                    <span class="material-input"></span>
                </div>
                </div> --}}

                </div>

                <div class="form-group label-floating is-empty">
                    <label class="control-label">Deskripsi Rapat</label>
                    <textarea name="description" class="form-control">
                    </textarea>
                    <span class="material-input"></span>
                </div>

                <button type="submit" class="btn btn-breez btn-lg full-width">Buat Rapat</button>
            </div>
        </form>

            </div>
        </div>
    </div>

</aside>

