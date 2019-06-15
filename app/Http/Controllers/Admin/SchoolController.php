<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\School;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schools = School::orderBy('name', 'asc')->paginate(8);
        // dd($schools);
        return view('admin.school.index', [
            'schools' => $schools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::pluck('name','id');
        // dd($schools);
        return view('admin.school.create', [
            'schools' => $schools

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);

        $image = $request->file('image')->store('schools');

        $data = School::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'image' => $image
        ]);

        return redirect()->route('school.index')->with('success', 'Data Sekolah Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        dd($school);
        return view('admin.school.index',[
            'school' => $school
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        return view('admin.school.edit',[
            'school' => $school
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required'
        ]);

        $image = null;
        if ($request->hasFile('image')) {
            if($school->image){
                Storage::delete($school->image);
            }
            $image = $request->file('image')->store('schools');
        }
        if (!$request->hasFile('image') && $school->image) {
            $image = $school->image;
        }


        $school->update([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'description' => $request->description,
            'image' => $image
        ]);
        return redirect()->route('school.index')->with('info', 'Data Sekolah Berhasil Diperbaharui');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        Storage::delete($school->image);

        $school->delete();

        return back()->with('danger', 'Data Sekolah Berhasil Dihapus');
    }
}
