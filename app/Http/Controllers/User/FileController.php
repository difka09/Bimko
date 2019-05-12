<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Input;

use DateTime;
use DB;


class FileController extends Controller
{

    public function filePage(Request $request)
    {
        $notifications = $request->user()->notifications;
        $files = new Post;
        if(request()->has('cari')){
            $files = $files->where([
               ['type','=',2],
               ['file_3','LIKE',"%{$request->cari}%"],
           ]);
       }

        if(request()->has('sort')){
            $files =  $files->where('type','=',2)->orderby('created_at', request('sort'));
        }
        if(request()->has('abjad')){
            $files =  $files->where('type','=',2)->orderBy('file_3',request('abjad'));
        }


            $files = $files->where('type','=',2)->paginate(4)->appends([
                'sort' => request('sort'),
                'abjad' => request('abjad'),
                'cari' =>  request('cari'),
            ]);

        return view('guru.filepage', [
            'files' => $files,
            'notifications' => $notifications,
            ]);

    }

    public function searchPeople(Request $request)
    {

        if($request->ajax()){
            $output="";
            $users = User::whereHas('roles',function($q){
                $q->where('name','Guru');
            })->where('name','LIKE','%'.$request->search.'%')->latest()->get();
            if($users)
            {
                $output.=' <div class="selectize-dropdown multi form-control" style="width: 500px; top: 70px; left: 0px; visibility: visible;">
                <div class="selectize-dropdown-content">';
                foreach ($users as $user)
                {
                $output.='
                <a href="'.route('guru.profil',$user->id).'"><div class="inline-items" data-selectable="">
                    <div class="author-thumb">
                            <img width="42px" height="42" src="'.$user->getImage().'" alt="avatar">
                    </div>
                    <div class="notification-event">
                        <span class="h6 notification-friend">'.$user->name.'</span>
                        <span style="color:blue" class="chat-message-item">'.$user->school->name.'</span>
                    </div>
                </div></a>';
                }
                $output.='</div></div>';

            }
            if($users->isEmpty()){
                $output.=' <div class="selectize-dropdown multi form-control" style="width: 500px; top: 70px; left: 0px; visibility: visible;">
                <div class="selectize-dropdown-content">';
                $output.='
                <a><div class="inline-items" data-selectable="">
                    <div class="notification-event">
                        <span class="h6 notification-friend">user tidak ditemukan</span>
                        <span style="color:blue" class="chat-message-item"></span>
                    </div>
                </div></a>';
                $output.='</div></div>';
            }
            return Response($output);

        }
    }

    // public function searchFile(Request $request)
    // {
    //     // $files = Post::where([
    //     //     ['file_3','LIKE','%'.$request->search.'%'],
    //     //     ['type','=',2]
    //     //     ])->paginate(4);
    //     // $files->appends($request->only('search'));


    //     // dd($files);

    //     if($request->ajax()){
    //         $output="";
    //         $files = Post::where([
    //             ['file_3','LIKE','%'.$request->search.'%'],
    //             ['type','=',2]
    //             ])->latest()->paginate(4);
    //             // $files = Post::where('file_3','LIKE','%'.$request->search.'%')->latest()->paginate(4);

    //         // ->orWhere('file_2','LIKE','%'.$request->search.'%')


    //     if($files)
    //     {
    //         $output .='<ul class="notification-list">';
    //         foreach($files as $file)
    //         {
    //             $output .=' <li>
    //             <div class="author-thumb">
    //                 <img width="42px" height="42px" src="'.$file->user->getImage().'" alt="author">
    //             </div>
    //             <div class="notification-event">
    //                 <a href="#" class="h6 notification-friend">'.$file->user->name.'</a> telah mengupload file <a href="#" class="notification-link">'.$file->title.''.substr(($file->file_2),-4).'</a>
    //                 <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
    //             </div>
    //             <span class="notification-icon">
    //                 <a href="'.route('guru.show',$file).'" class="btn btn-blue btn-sm">Lihat</a>
    //                 <a href="'.route('guru.download',$file).'" class="btn btn-green btn-sm">Download</a>
    //             </span>
    //         </li>';
    //         }
    //         $output .='</div>';
    //         return Response($output);
    //     }

    //         }
    // }

    public function sortbyAbjad(Request $request)
    {

    if($request->ajax()){
            $output="";
            $files = Post::orderBy('title','ASC')->where('type','=',2)->paginate(4);

        if($files)
        {
            $output .='<ul class="notification-list">';
            foreach($files as $file)
            {
                $output .=' <li>
                <div class="author-thumb">
                    <img width="42px" height="42px" src="'.$file->user->getImage().'" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">'.$file->user->name.'</a> telah mengupload file <a href="#" class="notification-link">'.$file->title.''.substr(($file->file_2),-4).'</a>
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                    <a href="'.route('guru.show',$file).'" class="btn btn-blue btn-sm">Lihat</a>
                    <a href="'.route('guru.download',$file).'" class="btn btn-green btn-sm">Download</a>
                </span>
            </li>';
            }
            $output .='</div>';
            return Response($output);
        }

    }
    }

    public function sortbyDate(Request $request)
    {

    if($request->ajax()){
            $output="";
            $files = Post::latest()->where('type','=',2)->paginate(4);

        if($files)
        {
            $output .='<ul class="notification-list">';
            foreach($files as $file)
            {
                $output .=' <li>
                <div class="author-thumb">
                    <img width="42px" height="42px" src="'.$file->user->getImage().'" alt="author">
                </div>
                <div class="notification-event">
                    <a href="#" class="h6 notification-friend">'.$file->user->name.'</a> telah mengupload file <a href="#" class="notification-link">'.$file->title.''.substr(($file->file_2),-4).'</a>
                    <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span>
                </div>
                <span class="notification-icon">
                    <a href="'.route('guru.show',$file).'" class="btn btn-blue btn-sm">Lihat</a>
                    <a href="'.route('guru.download',$file).'" class="btn btn-green btn-sm">Download</a>
                </span>
            </li>';
            }
            $output .='</div>';
            return Response($output);
        }

    }
    }
}
