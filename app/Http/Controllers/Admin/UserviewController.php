<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Userview;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserviewController extends Controller
{
    Public function indexGuru()
    {
        $users = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Guru')->paginate(2);;
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
        $users = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Murid')->paginate(2);
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

    public function createGuru()
    {
        return view('admin.user.createGuru');
    }

    public function createMurid()
    {
        return view('admin.user.createMurid');
    }

    public function createGuest()
    {
        return view('landing');
    }

    public function storeGuru(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'identity' => 'required|numeric',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric',
            // 'file' => ''
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'identity' => $request->identity,
            'grade' => $request->grade,
            'phone' => $request->phone,
            'file' => 'users/woman.gif'

        ]);
        $data->assignRole('Guru');

        return redirect()->route('user.guru')->with('success', 'User has been added');
    }

    public function storeMurid(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'identity' => 'required|numeric',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric',
            // 'file' => ''
        ]);

        $data = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request['password']),
            'identity' => $request->identity,
            'grade' => $request->grade,
            'phone' => $request->phone
        ]);
        $data->assignRole('Murid');

        return redirect()->route('user.murid')->with('success', 'User has been added');
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

}
