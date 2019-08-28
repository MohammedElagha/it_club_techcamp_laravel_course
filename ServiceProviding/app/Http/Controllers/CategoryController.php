<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select('id', 'name', 'icon', 'deleted_at')->get();

        return view('category.view')->with('categories', $categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.add');
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
        $category_controller_2 = (new CategoryController2);

        if ($request->has('category_name') && $request->hasFile('category_icon')) {
            if (!empty($request['category_name'])) {
                $category = new Category;
                $category->name = $request['category_name'];
                $category->created_by = session('id');

                $icon = $request->file('category_icon');
                $icon_name = $category_controller_2->generate_category_icon_name($icon);
                $category->icon = $icon_name;

                $result = $category->save();

                if ($result) {
                    $category_controller_2->upload_category_icon($icon, $icon_name);
                    $status = true;
                }
            }
        }

        return redirect('category/add')->with('add_category_status', $status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        // $category = Category::where('id', $id)->first();

        return view('category.edit')->with('category', $category);
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
        $status = false;
        $category_controller_2 = new CategoryController2();

        if ($request->has('category_name')) {
            $category = Category::find($id);

            if (isset($category)) {
                $category->name = $request['category_name'];
                $category->updated_by = session('id');

                if ($request->hasFile('category_icon')) {
                    $icon = $request->file('category_icon');
                    $icon_name = $category_controller_2->generate_category_icon_name($icon);
                    $category->icon = $icon_name;
                }

                $result = $category->save();

                if ($result) {
                    if ($request->hasFile('category_icon')) {
                        $category_controller_2->upload_category_icon($icon, $icon_name);
                    }
                    $status = true;
                }
            }
        }

        return redirect('category/' . $id)->with('update_category_status', $status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = false;
        $category = Category::find($id);

        if (isset($category)) {
            Category::where('id', $id)->update(["deleted_by" => session('id')]);
            $result = $category->delete();

            if ($result) {
                $status = true;
            }
        }

        return redirect('category')->with('delete_category_status', $status);
    }
}
