<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\PartnersModel;
use App\Models\UploadModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;

class Partners extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partnerList = PartnersModel::all();
        return view('pages.adminpanel.partners.index',compact('partnerList'));
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

        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('partners_logo','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        $input['logo_id'] = $uploadId;

        PartnersModel::create($input);
        return redirect('adminpanel\partners');
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
        $partnerList = PartnersModel::findorFail($id);
        return view('pages.adminpanel.partners.edit',compact('partnerList'));
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
        $partnerList = PartnersModel::findorFail($id);
        $uploadId= $partnerList->logo_id;
        $input = $request->all();

        if(!empty($input['remove_image']))
        {
            $uploadId = 0;
            unset($input['remove_image']);
        }
        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('partners_logo','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        $input['logo_id'] = $uploadId;

        $partnerList->update($input);
        return redirect('adminpanel\partners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PartnersModel::findorFail($id)->delete();
        return redirect('adminpanel\partners');
    }
}
