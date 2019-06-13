<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
Use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Exports\SchoolsExport;

class ImportController extends Controller
{
    public function indexImport()
    {
        return view('admin.import');
    }

    public function storeMurid(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx'
        ],[
            'file.required' => 'file kosong',
            'file.mimes' => 'file harus berupa xls atau xlsx'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal mengimport data siswa : '.$validate->getMessageBag()->first().'')
                ->withInput($request->all())
                ->withErrors($validate);
        }
        $data = Excel::toCollection(new UsersImport, request()->file('file'));

        foreach($data[0] as $row) {
            $user = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make('12345678'),
            'nis' => $row['nis'],
            'nip' => $row['nip'],
            'gender' => $row['gender'],
            'agency' => $row['agency'],
            'grade' => $row['grade'],
            'phone' => $row['phone'],
            'file' => $row['file'],
            'school_id' => $row['school_id']
            ];

            $insertData = User::create($user);
            $insertData->assignRole('Murid');
        }
        // if($insertData){
            return back()->with('success', 'Berhasil mengimport data siswa');
        // }else{
            // return back()->with('danger', 'gagal mengimport data siswa');
        // }


    }

    public function storeGuru(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'file' => 'required|mimes:xls,xlsx'
        ],[
            'file.required' => 'file kosong',
            'file.mimes' => 'file harus berupa xls atau xlsx'
        ]);

        if($validate->fails())
        {
            return back()
                ->with('danger', 'Gagal mengimport data guru :'.$validate->getMessageBag()->first().'')
                ->withInput($request->all())
                ->withErrors($validate);
        }
        $data = Excel::toCollection(new UsersImport, request()->file('file'));
        foreach($data[0] as $row) {
            $user = [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'password' => Hash::make('12345678'),
            'nis' => $row['nis'],
            'nip' => $row['nip'],
            'gender' => $row['gender'],
            'agency' => $row['agency'],
            'grade' => $row['grade'],
            'phone' => $row['phone'],
            'file' => $row['file'],
            'school_id' => $row['school_id']
            ];

            $insertData = User::create($user);
            $insertData->assignRole('Guru');
        }
        // if($insertData){
        return back()->with('success', 'Berhasil mengimport data guru');
        // }else{
        // return back()->with('danger', 'gagal mengimport data guru');
        // }
    }

    public function export()
    {
        return Excel::download(new SchoolsExport, 'schools.xlsx');
    }
}
