<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.add_student');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $status = false;

        if ($request->has('student_name') && $request->has('student_phone') && $request->has('student_email')) {

            if (!empty($request['student_name']) && !empty($request['student_phone']) && !empty($request['student_email'])) {

                $result = DB::table('students')->insert(["name" => $request['student_name'],
                                                "phone" => $request['student_phone'],
                                                "email" => $request['student_email']]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        return view('student.edit')->with('student', $student);
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
        if ($request->has('student_name') && $request->has('student_phone') && $request->has('student_email')) {

            if (!empty($request['student_name']) && !empty($request['student_phone']) && !empty($request['student_email'])) {

                $result = DB::table('students')->where('id', $id)->update(["name" => $request['student_name'], "phone" => $request['student_phone'], "email" => $request['student_email']]);

                return redirect('student/' . $id);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
