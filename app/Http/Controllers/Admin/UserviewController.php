<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userview;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\School;
use App\Models\Catfeed;

class UserviewController extends Controller
{
    Public function indexGuru()
    {
        $users = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Guru')->paginate(8);;
        $checkusers = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Guru')->count();

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
        $users = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Murid')->paginate(8);
        $checkusers = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Murid')->count();
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
        $users = Userview::orderBy('name', 'asc')->where('roleName', '=', 'guest')->paginate(8);
        $checkusers = Userview::orderBy('name', 'asc')->where('roleName', '=', 'guest')->count();
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nip' => 'required|numeric|unique:users',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric',
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'nis' => 'required|numeric|unique:users',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric',
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'agency' => 'required',
            'phone' => 'required|numeric',
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
        $guru = Userview::All()->where('roleName', '=', 'Guru')->count();
        $murid = Userview::All()->where('roleName', '=', 'Murid')->count();
        // dd($users);
        return view('admin.index', [
            'guru' => $guru,
            'murid' => $murid
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

}
