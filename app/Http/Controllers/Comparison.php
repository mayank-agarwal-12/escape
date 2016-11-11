<?php

namespace App\Http\Controllers;

use App\Models\ComparisonModel;
use Illuminate\Http\Request;

use App\Http\Requests;
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
        $iterator = 1;
        $popularComparison = $this->getPopularComparisons();
        return view('pages.comparison.index',compact('comparisonObj'),['popularComparison'=>$popularComparison]);
    }

    public function show($name)
    {
        $comparisonObj = ComparisonModel::where('name',$name)->get()->first();
        $uploadId = $comparisonObj->upload_id;
        $path = storage_path('app/'.$comparisonObj->upload->path);
        $comparisonArr = [];
        $tableHead = [];
        $column0 = [];
        $data = Excel::load($path, function ($reader) {
        })->get()->first();
        if (!empty($data) && $data->count())
        {
            foreach($data->toArray() as $key=>$value)
            {
                if (!empty($value))
                {
                    foreach($value as $key=>$item)
                    {
                        if($key === 'model')
                        {
                            $tableHead[] = $key;
                            $tableHead[] = $item;
                        }
                        else
                        {
                            $comparisonArr[$key][] = $item;
                        }


                    }
                }
            }
        }
        $tableHead = array_unique($tableHead);

        //$popularComparison = $this->getPopularComparisons();
        return view('pages.comparison.details',compact('comparisonObj'),['comparisonArr'=>$comparisonArr,'tableHead'=>$tableHead]);
    }

    protected function getPopularComparisons()
    {
        $comparisonObj = new ComparisonModel();
        return $comparisonObj->orderBy('id','asc')->take(5)->get();
    }
}
