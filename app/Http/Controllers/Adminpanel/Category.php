<?php

namespace App\Http\Controllers\Adminpanel;


use App\Models\CategoryModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class Category extends Controller
{
    //protected static $tableName = 'categories';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $categoryArr = DB::table(self::$tableName)->get();
        $categoryArr = CategoryModel::all();
        $catLists = [];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        return view('pages.adminpanel.category.index',compact('categoryArr')+['catLists'=>$catLists]);
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
        $input = $request->all();
        CategoryModel::create($input);
       /* DB::table(static::$tableName)->insert([
            'name'=>$input['name'],
            'parent_id'=>$input['parent_id']
        ]);*/
        return redirect('adminpanel/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return redirect('adminpanel/category');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = CategoryModel::findorFail($id);
        $categoryArr = CategoryModel::all();
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        return view('pages.adminpanel.category.edit',compact('category')+['catLists'=>$catLists]);

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
        $category = CategoryModel::findorFail($id);

        $input = $request->all();
        $category->update($input);
        return redirect('adminpanel/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoryModel::findorFail($id)->delete();
        CategoryModel::where('parent_id',$id)->update(['parent_id'=>0]);
        return redirect('adminpanel/category');
    }
}
