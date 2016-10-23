<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\ApplicationDevicesModel;
use App\Models\ApplicationMapperModel;
use App\Models\TestCasesModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApplicationDevices extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $testCases = TestCasesModel::all();
        $testList = [];
        foreach($testCases as $testCase)
        {
            $testList[$testCase->id] = $testCase->name;
        }
        $deviceList = ApplicationDevicesModel::all();
        return view('pages.adminpanel.applicationdevices.index',compact('deviceList'),['testCasesLists'=>$testList]);

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
        $deviceId = ApplicationDevicesModel::create($input)->id;
        foreach($input['testcases'] as $testcase)
        {
            $insertArr = [
                'testcase_id'=>$testcase,
                'application_device_id'=>$deviceId
            ];

            ApplicationMapperModel::create($insertArr);
        }
        return redirect('adminpanel/applicationdevices');
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
        $device = ApplicationDevicesModel::findorFail($id);
        $testCases = TestCasesModel::all();
        $testList = [];
        $selectedTestCase = [];
        foreach($testCases as $testCase)
        {
            $testList[$testCase->id] = $testCase->name;
        }
        foreach ($device->testcases as $testcase)
        {
            $selectedTestCase[] = $testcase->id;
        }
        return view('pages.adminpanel.applicationdevices.edit',compact('device'),['testCasesLists'=>$testList,'selectedTestCase'=>$selectedTestCase]);
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
        $device = ApplicationDevicesModel::findorFail($id);
        $input = $request->all();
        $device->update($input);
        $device->testcases()->sync($input['testcases']);
        /*foreach($input['categories'] as $category)
        {
            $insertArr = [
                'category_id'=>$category,
                'expert_id'=>$id
            ];
            CategoryExpertModel::create($insertArr);
        }*/
        return redirect('adminpanel/applicationdevices');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = ApplicationDevicesModel::findorFail($id);
        $device->testcases()->detach();
        $device->delete();
        return redirect('adminpanel/applicationdevices');
    }
}
