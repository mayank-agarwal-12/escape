<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\CategoryModel;
use App\Models\ExpertsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class Experts extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categoryArr = CategoryModel::all();
        $catLists = [];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        $expertList = ExpertsModel::all();
        return view('pages.adminpanel.experts.index',compact('expertList'),['categoryList'=>$catLists]);
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
        ExpertsModel::create($input);
        /* DB::table(static::$tableName)->insert([
             'name'=>$input['name'],
             'parent_id'=>$input['parent_id']
         ]);*/
        return redirect('adminpanel/experts');
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
        ExpertsModel::findorFail($id)->delete();

        return redirect('adminpanel/experts');
    }
}
