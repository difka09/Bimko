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
        $emails = User::pluck('email')->toArray();
        $niss = User::pluck('nis')->toArray();

        $data = Excel::toCollection(new UsersImport, request()->file('file'));
        if($data[0][1]['name'] == '')
        {
            $sum_row = '';   
        }

    foreach($data[0] as $row) {
        if($row['name']=='')
            break;
        if($row['nis'] =='')
            $zonk ='';
        if(in_array($row['email'], $emails))
        $email[] = [
            'email' => $row['email']
        ];
        elseif(in_array($row['nis'],$niss))
        $nis[] = [
            'nis' => $row['nis']
        ];
    }

    if(isset($email))
        {
            $b = collect($email);
            $c = $b->implode('email', ', ');
            return back()->with('danger', 'Gagal mengimport data siswa. Data email duplikat : '.$c.'');
    }
    elseif(isset($zonk) && !isset($sum_row) && $row['name']!='')
    {
        return back()->with('danger', 'Gagal mengimport data siswa. Terdapat data NIS kosong');
    }
    elseif(isset($sum_row))
    {
        $user = [
            'id' => $data[0][0]['id'],
            'name' => $data[0][0]['name'],
            'email' => $data[0][0]['email'],
            'password' => Hash::make('12345678'),
            'nis' => $data[0][0]['nis'],
            'nip' => $data[0][0]['nip'],
            'gender' => $data[0][0]['gender'],
            'agency' => $data[0][0]['agency'],
            'grade' => $data[0][0]['grade'],
            'phone' => $data[0][0]['phone'],
            'file' => $data[0][0]['file'],
            'school_id' => $data[0][0]['school_id']
        ];
        $insertData = User::create($user);
        $insertData->assignRole('Murid');
        return back()->with('success', 'Berhasil mengimport data siswa');
    }
    elseif(isset($nis))
    {
            $b = collect($nis);
            $c = $b->implode('nis', ', ');
            return back()->with('danger', 'Gagal mengimport data siswa. Data nis duplikat : '.$c.'');
    }
    else
    {
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
        return back()->with('success', 'Berhasil mengimport data siswa');
    }
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
        $emails = User::pluck('email')->toArray();
        $nips = User::pluck('nip')->toArray();
        $data = Excel::toCollection(new UsersImport, request()->file('file'));
        if($data[0][1]['name'] == '')
        {
            $sum_row = '';   
        }
        foreach($data[0] as $row) {
            if($row['name']=='')
                break;
            if($row['nip'] =='')
                $zonk ='';
        
            elseif($row['nip'] != '')
                if(in_array($row['nip'],$nips))
                $nip[] = [
                    'nip' => $row['nip']
                ];

            if(in_array($row['email'], $emails))
            $email[] = [
                'email' => $row['email']
            ];
            
        }

        if(isset($email))
        {
            $b = collect($email);
            $c = $b->implode('email', ', ');


            return back()->with('danger', 'Gagal mengimport data guru. Data email duplikat : '.$c.'');
        }
        elseif(isset($zonk) && !isset($sum_row) && $row['name']!='')
        {
            return back()->with('danger', 'Gagal mengimport data guru. Terdapat data NIP kosong');
        }
        elseif(isset($sum_row))
        {
        $user = [
            'id' => $data[0][0]['id'],
            'name' => $data[0][0]['name'],
            'email' => $data[0][0]['email'],
            'password' => Hash::make('12345678'),
            'nis' => $data[0][0]['nis'],
            'nip' => $data[0][0]['nip'],
            'gender' => $data[0][0]['gender'],
            'agency' => $data[0][0]['agency'],
            'grade' => $data[0][0]['grade'],
            'phone' => $data[0][0]['phone'],
            'file' => $data[0][0]['file'],
            'school_id' => $data[0][0]['school_id']
        ];
        $insertData = User::create($user);
        $insertData->assignRole('Guru');
        return back()->with('success', 'Berhasil mengimport data guru');
        }
        elseif(isset($nip))
        {
            $b = collect($nip);
            $c = $b->implode('nip', ', ');
            return back()->with('danger', 'Gagal mengimport data guru. Data NIP duplikat : '.$c.'');

        }
        else
        {
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
        return back()->with('success', 'Berhasil mengimport data guru');

    }

    }

    public function export()
    {
        return Excel::download(new SchoolsExport, 'schools.xlsx');
    }
}
