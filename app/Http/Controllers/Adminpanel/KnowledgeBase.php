<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\KnowledgeBaseModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class KnowledgeBase extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knowledgeBaseList = KnowledgeBaseModel::all();
        $categoryArr = CategoryModel::all();
        $catLists = [];

        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        return view('pages.adminpanel.knowledgebase.index',compact('knowledgeBaseList'),['catLists'=>$catLists]);
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
        if(empty($input['category_id']))
        {
            return back()->with('status', trans('Please select Category'));
        }
        KnowledgeBaseModel::create($input);
        return redirect('adminpanel\knowledgebase');
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
        $knowledgeBaseList = KnowledgeBaseModel::findorFail($id);
        $categoryArr = CategoryModel::all();
        $catLists = [];

        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }
        return view('pages.adminpanel.knowledgebase.edit',compact('knowledgeBaseList'),['catLists'=>$catLists]);
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
        $knowledgeBaseObj = KnowledgeBaseModel::findorFail($id);
        $input = $request->all();
        if(empty($input['category_id']))
        {
            return back()->with('status', trans('Please select Category'));
        }
        $knowledgeBaseObj->update($input);
        return redirect('adminpanel\knowledgebase');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        KnowledgeBaseModel::findorFail($id)->delete();
        return redirect('adminpanel\knowledgebase');
    }
}
