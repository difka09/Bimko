<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\models\User;
use App\models\Userview;

class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('name', 'asc')->paginate(2);
        // dd($users);
        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
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
        $data->assignRole('Guru');

        return redirect()->route('user.index')->with('success', 'User has been added');
    }

    public function show(User $user)
    {
        // dd($user);
        return view('admin.user.trash', [
           'user' =>  $user
        ]);
    }

    public function edit(User $user)
    {
        // $user = User::find($id);
        return view('admin.user.edit',[
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $users = Userview::find($user->id);


        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            // 'password' => 'required|min:8',
            'identity' => 'required|numeric',
            'grade' => 'required|numeric|min:10|max:12',
            'phone' => 'required|numeric',
            // 'file' => ''
        ]);
            // dd($users);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // 'password' => Hash::make($request['password']),
            'identity' => $request->identity,
            'grade' => $request->grade,
            'phone' => $request->phone
        ]);

        if($users->roleName=='Murid')
        {

            return redirect()->route('user.murid')->with('info', 'User has been edited');
        }
        if($users->roleName=='Guru')
        {
            return redirect()->route('user.guru')->with('info', 'User has been edited');
        }

    }


    public function resetPassword(Request $request, User $user)
    {
        // $user = User::find($id);
        $user->update([
            'password' => Hash::make($request['password']),
        ]);
        return back()->with('info', 'Password has been reset');
    }

    public function destroy(User $user)
    {
        // $user = User::find($id);
        $user->delete();

        return back()->with('danger', 'User has been deleted');
    }

    public function destroyPermanent($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->forceDelete();

        return back()->with('danger', 'User has been deleted permanently');
    }

    public function viewTrash()
    {
        $users = User::onlyTrashed()->paginate(2);
        return view('admin.user.trash', [
            'users' => $users
        ]);

    }

    public function restoreAll()
    {
        $user = User::onlyTrashed();
        $user->restore();

        return back()->with('success', 'Semua data telah direstore');
    }

    public function restoreTrash($id)
    {
        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        return back()->with('success', 'Data telah restored');
    }

    public function trashShow($id)
    {
        $user = User::withTrashed()->where('id', $id)->get();
        return view('admin.user.trash',[
            'user' => $user
        ]);
    }
}
