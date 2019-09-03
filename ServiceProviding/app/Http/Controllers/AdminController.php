<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserGroup;
use App\Admin;
use App\AdminLogin;

class AdminController extends Controller
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
        $user_groups = UserGroup::all();
        return view('admin.add')->with('user_groups', $user_groups);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin = new Admin;
        $admin->name = $request['admin_name'];
        $admin->email = $request['admin_email'];
        $admin->user_group_id = $request['user_group_id'];
        $admin->created_by = session('id');
        $result = $admin->save();

        if ($result) {
            $admin_login = new AdminLogin;
            $admin_login->admin_id = $admin->id;
            $admin_login->username = $request['admin_username'];
            $admin_login->password = bcrypt($request['admin_password']);
            $admin_login->save();
        }

        return redirect('admin/add');
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
