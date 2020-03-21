<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userview;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Catfeed;
use Illuminate\Support\Facades\Validator;

class UserviewController extends Controller
{
    Public function indexGuru()
    {
        $users = User::whereHas('roles',function($q){
                $q->where('name','Guru');
            })->orderBy('name','asc')->paginate(8);
        $checkusers = User::whereHas('roles',function($q){
                $q->where('name','Guru');
            })->count();

        if($checkusers == 0){
            return view('admin.user.emptyPage', [
                'users' => $users,
                'checkusers' => $checkusers
            ]);
        }

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    Public function indexMurid()
    {
        $users = User::whereHas('roles',function($q){
                $q->where('name','Murid');
            })->orderBy('name','asc')->paginate(8);
        $checkusers = User::whereHas('roles',function($q){
                $q->where('name','Murid');
            })->count();
        // dd($checkusers);
        if($checkusers == 0){
            return view('admin.user.emptyPage', [
                'users' => $users,
                'checkusers' => $checkusers
            ]);
        }
        return view('admin.user.index', [
            'users' => $users,
            'checkusers' => $checkusers
        ]);
    }

    Public function indexGuest()
    {
        $users = User::whereHas('roles',function($q){
                $q->where('name','guest');
            })->orderBy('name','asc')->paginate(8);
        $checkusers = User::whereHas('roles',function($q){
                $q->where('name','guest');
            })->count();
        // dd($checkusers);
        if($checkusers == 0){
            return view('admin.user.emptyPage', [
                'users' => $users,
                'checkusers' => $checkusers
            ]);
        }
        return view('admin.user.index', [
            'users' => $users,
            'checkusers' => $checkusers
        ]);
    }

    public function createGuru()
    {
        $schools = School::get();
        return view('admin.user.createGuru',['schools' => $schools]);
    }

    public function createMurid()
    {
        $schools = School::get();

        return view('admin.user.createMurid',['schools' => $schools]);
    }

    public function createGuest()
    {
        return view('admin.user.createGuest');
    }

    public function storeGuru(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nip' => 'required|min:0|numeric|digits:18|unique:users',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric|min:0|digits_between:1,15',
            'school_id' => 'required',
            'gender' => 'required',
        ]);
        if($request->gender == 2){
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'nip' => $request->nip,
                'grade' => $request->grade,
                'phone' => $request->phone,
                'file' => 'users/woman.png',
                'school_id' => $request->school_id,
                'gender' => $request->gender,

            ]);
        }
        elseif($request->gender == 1)
        {
            $data = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request['password']),
                'nip' => $request->nip,
                'grade' => $request->grade,
                'phone' => $request->phone,
                'file' => 'users/man.png',
                'school_id' => $request->school_id,
                'gender' => $request->gender,

            ]);
        }

        $data->assignRole('Guru');

        return redirect()->route('user.guru')->with('success', 'User Guru berhasil ditambahkan');
    }

    public function storeMurid(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nis' => 'required|min:0|numeric|unique:users',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric|min:0|digits_between:10,15',
            'school_id' => 'required',
            // 'file' => ''
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'nis' => $request->nis,
            'grade' => $request->grade,
            'phone' => $request->phone,
            'school_id' => $request->school_id,

        ]);
        $data->assignRole('Murid');

        return redirect()->route('user.murid')->with('success', 'User Murid berhasil ditambahkan');
    }

    public function storeGuest(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'agency' => 'required',
            'phone' => 'required|numeric|min:0|digits_between:10,15',
            // 'file' => ''
        ]);

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'agency' => $request['agency'],
            'phone' => $request['phone']
        ]);
        $data->assignRole('guest');

        return redirect()->route('user.guest')->with('success', 'User Responder berhasil ditambahkan');
    }

    public function CountUser(){
        $guru = User::whereHas('roles',function($q){
                $q->where('name','Guru');
            })->count();
        $murid = User::whereHas('roles',function($q){
                $q->where('name','Murid');
            })->count();
        $responder = User::whereHas('roles',function($q){
                $q->where('name','guest');
            })->count();
        $school = School::all()->count();
        // dd($users);
        return view('admin.index', [
            'guru' => $guru,
            'murid' => $murid,
            'responder' => $responder,
            'school' => $school
        ]);
    }

        Public function indexCategory()
        {
            $users = Catfeed::latest()->paginate(8);
            $categories = Catfeed::latest()->paginate(8);

            $checkcategories = Catfeed::count();
            if($checkcategories == 0){
                return view('admin.user.emptyPage', [
                    'users' => $users,
                    'checkcategories' => $checkcategories
                ]);
            }
            return view('admin.user.indexCategory', [
                'categories' => $categories,
                'checkcategories' => $checkcategories
            ]);
        }

        public function createCategory()
        {
            return view('admin.user.createCategory');
        }

        public function storeCategory(Request $request)
        {
            $this->validate($request,[
                'name' => 'required|unique:catfeeds',
            ]);

            Catfeed::create([
                'name' => $request['name'],
                'slug' => str_slug($request->name)

            ]);

            return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan');
        }

        public function destroyCategory(Catfeed $category)
        {
            $category->delete();

            return redirect()->route('category.index')->with('danger', 'Category berhasil di hapus');
        }

        public function editCategory(Catfeed $category)
        {
        return view('admin.user.editCategory',[
            'category' => $category,
        ]);
        }

    public function updateCategory(Request $request, Catfeed $category)
    {
        $this->validate($request,[
            'name' => 'required|unique:catfeeds,name,'.$category->id,
        ]);

        $category->update([
        'name' => $request->name,
        'slug' => str_slug($request->name)
        ]);

        return redirect()->route('category.index')->with('info', 'Kategori berhasil diedit');
    }

    public function changePassword(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $validate = Validator::make($request->all(),[
            'password' => 'required',
            'new_password' => 'required|min:8'

        ],
        [
            'password.required' => 'password lama kosong',
            'new_password.required' => 'password baru kosong',
            'new_password.min' => 'password baru minimal 8 karakter',

        ]);

        if($validate->fails())
        {
            return back()->with('danger-admin', 'Gagal memperbarui password admin, '.$validate->getMessageBag()->first().'');
        }

        if(Hash::check($request->password, $user->password))
        {
            $user->fill([
                'password' => Hash::make($request->new_password)
            ])->save();

            return back()->with('success-admin', 'Berhasil memperbarui password admin');

        }else
        {
            return back()->with('danger-admin', 'Gagal memperbaharui password, password lama salah');
        }

    }

}
