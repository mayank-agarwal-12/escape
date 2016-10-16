<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\CategoryExpertModel;
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
        $expertId = ExpertsModel::create($input)->id;
        foreach($input['categories'] as $category)
        {
            $insertArr = [
                'category_id'=>$category,
                'expert_id'=>$expertId
            ];

            CategoryExpertModel::create($insertArr);
        }
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
        $expert = ExpertsModel::findorFail($id);
        $categoryArr = CategoryModel::all();
        $catLists = [];
        $selectedCat = [];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        foreach ($expert->category as $category)
        {
            $selectedCat[] = $category->id;
        }
        return view('pages.adminpanel.experts.edit',compact('expert'),['categoryList'=>$catLists,'selectedCat'=>$selectedCat]);
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
        $expert = ExpertsModel::findorFail($id);
        $input = $request->all();
        $expert->update($input);
        $expert->category()->sync($input['categories']);
        /*foreach($input['categories'] as $category)
        {
            $insertArr = [
                'category_id'=>$category,
                'expert_id'=>$id
            ];
            CategoryExpertModel::create($insertArr);
        }*/
            return redirect('adminpanel/experts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expert = ExpertsModel::findorFail($id);
        $expert->category()->detach();
       $expert->delete();

        return redirect('adminpanel/experts');
    }
}
