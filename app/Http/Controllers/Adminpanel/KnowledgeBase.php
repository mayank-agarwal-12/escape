<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
use App\Models\KnowledgeBaseModel;
use App\Models\UploadModel;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

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
        $userObj = User::all();
        $userLists = [];

        foreach($userObj as $user)
        {
            $userLists[$user->id] = $user->name;
        }

        return view('pages.adminpanel.knowledgebase.index',compact('knowledgeBaseList'),['userLists'=>$userLists]);
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
        $uploadId = 0;
        $input = $request->all();
        if(empty($input['user_id']))
        {
            return back()->with('status', trans('Please select User'));
        }
        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('kb_image','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        $input = $request->all();
        $input['upload_id'] = $uploadId;

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

        $userObj = User::all();
        $userLists = [];

        foreach($userObj as $user)
        {
            $userLists[$user->id] = $user->name;
        }

        return view('pages.adminpanel.knowledgebase.edit',compact('knowledgeBaseList'),['userLists'=>$userLists]);
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
        $uploadId= $knowledgeBaseObj->upload_id;
        $input = $request->all();

        if(empty($input['user_id']))
        {
            return back()->with('status', trans('Please select User'));
        }
        if(!empty($input['remove_image']))
        {
            $uploadId = 0;
            unset($input['remove_image']);
        }
        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('kb_image','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        $input['upload_id'] = $uploadId;

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
