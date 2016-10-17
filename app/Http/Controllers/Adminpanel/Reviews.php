<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\CategoryModel;
use App\Models\ReviewsModel;
use App\Models\UploadModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class Reviews extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviewObj = ReviewsModel::all();
        /*$categoryArr = CategoryModel::all();
        $catLists = [];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }*/
        return view('pages.adminpanel.reviews.index',compact('reviewObj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoryArr = CategoryModel::all();
        $catLists = [];
        $userLists = ['1'=>'admin'];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }

        return view('pages.adminpanel.reviews.create',['catLists'=>$catLists,'userLists'=>$userLists]);
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
        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('review_image','public');

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
        ReviewsModel::create($input);
        return redirect('adminpanel/reviews');
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
        $review = ReviewsModel::findorFail($id);
        $categoryArr = CategoryModel::all();
        $catLists = [];
        $userLists = ['1'=>'admin'];
        foreach($categoryArr as $cat)
        {
            $catLists[$cat->id] = $cat->name;
        }

        return view('pages.adminpanel.reviews.edit',compact('review')+['catLists'=>$catLists,'userLists'=>$userLists]);
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
        $review = ReviewsModel::findorFail($id);
        $uploadId= $review->upload_id;


        $input = $request->all();

        if(!empty($input['remove_image']))
        {
           $uploadId = 0;
            unset($input['remove_image']);
        }

        if($request->file('image'))
        {
            $path = $request->file('image')->storePublicly('review_image','public');

            $uploadArr = [
                'url'=> Storage::url($path),
                'type'=>'image',
                'storage'=>'filesystem\public',
                'path'=>$path
            ];
            $uploadId = UploadModel::firstOrCreate($uploadArr)->id;
        }
        $input['upload_id'] = $uploadId;
        $review->update($input);
        return redirect('adminpanel/reviews');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $review = ReviewsModel::findorFail($id);
      //  $review->image()->dissociate();
        $review->delete();

        return redirect('adminpanel/reviews');
    }
}
