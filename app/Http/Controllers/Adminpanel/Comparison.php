<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\ComparisonModel;
use App\Models\TagsMappingModel;
use App\Models\TagsModel;
use App\Models\UploadModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class Comparison extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comparisonObj = ComparisonModel::all();
        return view('pages.adminpanel.comparison.index',compact('comparisonObj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.adminpanel.comparison.create',[]);
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
        if($request->file('upload_file'))
        {
            $requestObj = $request->file('upload_file');
            $name = md5_file($requestObj->getRealPath()).'.'.$requestObj->guessClientExtension();
            $path = $requestObj->storeAs('comparison_device',$name);

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'file',
                'storage'=>'filesystem\comparison_device',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        if(!empty($uploadId))
        {
            $input['upload_id'] = $uploadId;
        }
        ComparisonModel::create($input);
        return redirect('adminpanel/comparison');
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
        $comparisonObj = ComparisonModel::findorFail($id);
        $uploadId = $comparisonObj->upload_id;
        $path = storage_path('app/'.$comparisonObj->upload->path);
        $tags = [];
        $data = Excel::load($path, function ($reader) {
        })->get();
        if (!empty($data) && $data->count())
        {
            foreach($data->toArray() as $key=>$value)
            {
                if (!empty($value))
                {
                    foreach($value as $v)
                    {
                            $tags[] = !empty($v['model']) ? $v['model']: '';
                            $tags[] = !empty($v['manufacturer']) ? $v['manufacturer']: '';
                    }
                }
            }
        }
        $tags = array_unique($tags);
        $tags = array_filter($tags);
        foreach($tags as $tag)
        {
            $input['name'] = $tag;
            $tagId = TagsModel::firstOrCreate($input)->id;
            $inputArr = [
                'tags_id'=>$tagId,
                'comparison_id'=>$id
            ];
            TagsMappingModel::create($inputArr);
        }
        return redirect('adminpanel/comparison');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comparison = ComparisonModel::findorFail($id);
        $comparison->tags()->detach();
        $comparison->delete();

        return redirect('adminpanel/comparison');
    }
}
