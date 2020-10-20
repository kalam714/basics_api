<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DB;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $students=DB::table('students')->get();
       return response()->json($students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=array();
       $data['class_id'] =$request->class_id;
       $data['section_id'] =$request->section_id;
       $data['name'] =$request->name;
       $data['phone'] =$request->phone;
       $data['email'] =$request->email;
       $data['password'] = Hash::make($request->password);
       $data['photo'] =$request->photo;
       $data['gender'] =$request->gender;
       $data['address'] =$request->address;
       DB::table('students')->insert($data);
       return response('Student Information added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $student=DB::table('students')->where('id',$id)->first();
       return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data=array();
        $data['class_id'] =$request->class_id;
        $data['section_id'] =$request->section_id;
        $data['name'] =$request->name;
        $data['phone'] =$request->phone;
        $data['email'] =$request->email;
        $data['password'] = Hash::make($request->password);
        $data['photo'] =$request->photo;
        $data['gender'] =$request->gender;
        $data['address'] =$request->address;
        DB::table('students')->where('id',$id)->update($data);
        return response('Student Information Updated');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  
        $photo=DB::table('students')->where('id',$id)->first();
        $photo_path=$photo->photo;
        unlink($photo_path);
        DB::table('students')->where('id',$id)->delete();
        return response('Student information deleted');
    }
}
