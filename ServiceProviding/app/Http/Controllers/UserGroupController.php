<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Section;
use App\UserGroup;
use App\UserGroupSection;

class UserGroupController extends Controller
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
        $sections = Section::all();
        return view('user-group.add')->with('sections', $sections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_group = new UserGroup;
        $user_group->name = $request['user_group_name'];
        $user_group->created_by = session('id');
        $result = $user_group->save();

        if ($result) {
            $new_user_group_sections = array();
            foreach ($request['section_id'] as $key => $section_id) {
                if ($section_id != 0) {
                    // $user_group_section = new UserGroupSection();
                    // $user_group_section->user_group_id = $user_group->id;
                    // $user_group_section->section_id = $section_id;
                    // $user_group_section->save();
                    $user_group_section = array("user_group_id" => $user_group->id,
                                                "section_id" => $section_id);
                    array_push($new_user_group_sections, $user_group_section);
                }
            }


            UserGroupSection::insert($new_user_group_sections);
        }

        return redirect('user-group/add');
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
        //
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
