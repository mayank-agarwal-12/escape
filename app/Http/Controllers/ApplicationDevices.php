<?php

namespace App\Http\Controllers;

use App\Models\ApplicationDevicesModel;
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
        $deviceList = ApplicationDevicesModel::all();
        return view('pages.applicationdevices.index',compact('deviceList'));

    }

    public function show($id)
    {
        $deviceList = ApplicationDevicesModel::where('id',$id)->get();
        $device = [];
        foreach($deviceList as $deviceRow)
        {
            $device = $deviceRow;
        }
        if(empty($device))
        {
            return back()->with('status', trans('No Application Helper found'));
        }
        return view('pages.applicationdevices.details',compact('device'));

    }
}
