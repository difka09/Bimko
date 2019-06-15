@extends('user.templates.panel.default')
@section('content')
<div class="col-10 col-lg-8 main-admin">
		<div class="title-admin pbot">Daftar Komentar</div>
		<div class="col-12 pic-content bbotn mtop">
				<div class="col-12 main-val">
					<div class="col-8">{{ Session::get('msg') }}</div>
                    @foreach ($feedcomments as $feedcomment)
                    <div class="col-12 val-content subval-content pbot">
							<div class="col-10 col-lg-8 col-md-6 col-sm-4 col-xs-2 sub-main">
								<div class="col-10 col-lg-8">
									<div class="col-12">{{ $feedcomment->username }}</div>
									<div class="col-12">{{ $feedcomment->message }}</div>
									<div class="col-12 ket-com">
										<?php $controller->fullTime($feedcomment->created_at); ?>
                                        <div class="col-9">Pada : <a href="{{route('feeds.show',$feedcomment->slug)}}">{{ $feedcomment->feedname }}</a></div>
									</div>
								</div>
								<div class="col-2 col-lg-2 pad1 ptop">
                                     <form method="POST" action="{{route('murid.deletecomment',$feedcomment->id)}}">
                                        @csrf
                                        @method("DELETE")
                                    <button type="submit" class="col-6 col-xs-4 btn-delete" onclick="return confirm('Yakin ingin menghapus comment ini?')">Hapus</button>
                                     </form>
								</div>
							</div>
						</div>

                    @endforeach
				</div>
        </div>
        <div>
                {{ $feedcomments->links('vendor.pagination.default') }}
        </div>
	</div>
@endsection
