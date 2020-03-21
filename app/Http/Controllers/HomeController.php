<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\School;
use App\Models\Userview;
use App\Models\Feed;

class HomeController extends Controller
{
    use RegistersUsers;

    public function __construct()
    {
        $this->middleware('guest');
        $this->maps = School::orderBy('name', 'asc')->get();
        $this->countArticle = Feed::where('status','=',1)->count();
        $this->countSchool = School::count();
        // $this->countResponder = Userview::orderby('name','asc')->where('roleName','=','guest')->count();
        // $this->countGuru = Userview::orderBy('name', 'asc')->where('roleName', '=', 'Guru')->count();
        $this->countResponder = User::whereHas('roles',function($q){
                $q->where('name','guest');
            })->count();
        $this->countGuru = User::whereHas('roles',function($q){
                $q->where('name','Guru');
            })->count();
    }


    public function index()
    {
        return view('landing',[
            'maps' => $this->maps,
            'countArticle' => $this->countArticle,
            'countSchool' => $this->countSchool,
            'countResponder' => $this->countResponder,
            'countGuru' => $this->countGuru,
        ]);
    }

    public function storeGuest(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required|regex:/^[\pL\s]+$/u',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'agency' => 'required',
            'phone' => 'required|numeric|min:0|digits_between:10,15',
        ],
        [
            'name.required' => 'Nama harus diisi',
            'name.regex'    => 'Nama harus berformat alfabet',
            'email.required' => 'Email harus diisi',
            'email.email'   => 'Harus berformat email (name@domain.com)',
            'emai.unique'   => 'Email telah terdaftar silahkan gunakan email lain',
            'password.required' => 'Password harus diisi',
            'password.min'      => 'Minimal Password 8 Karakter',
            'agency.required'   => 'Instansi harus diisi',
            'phone.required'    => 'Nomor telepon harus diisi',
            'phone.numeric'     => 'Nomor telepon harus berformat angka',
            'phone.min'         => 'Nomor telepon harus angka bulat positif',
            'digits_between'    => 'Masukkan jumlah digit nomor telepon dengan benar'
            
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal mendaftar akun')
                ->withInput($request->all())
                ->withErrors($validate);
        }

        $data = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'agency' => $request['agency'],
            'phone' => $request['phone']
        ]);

        $data->assignRole('guest');
        $this->guard()->login($data);

        return $this->registered($request, $data)
                        ?: redirect($this->redirectPath());

    }

    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/register-sukses/redirect' ;
    }
}
