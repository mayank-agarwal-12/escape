<?php

namespace App\Http\Controllers\Adminpanel;

use App\Models\EventsModel;
use App\Models\PartnersModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;

class Events extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventList = EventsModel::all();
        return view('pages.adminpanel.events.index',compact('eventList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partnerArr = PartnersModel::all();
        $partnerList = [];
        foreach($partnerArr as $partner)
        {
            $partnerList[$partner->id] = $partner->name;
        }
        return view('pages.adminpanel.events.create',compact('partnerList'));
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
        EventsModel::create($input);
        return redirect('adminpanel\events');
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
        $eventList = EventsModel::findorFail($id);
        $partnerArr = PartnersModel::all();
        $partnerList = [];
        foreach($partnerArr as $partner)
        {
            $partnerList[$partner->id] = $partner->name;
        }
        return view('pages.adminpanel.events.edit',compact('eventList'),['partnerList'=>$partnerList]);
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
        $eventList = EventsModel::findorFail($id);
        $input = $request->all();
        $eventList->update($input);
        return redirect('adminpanel\events');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EventsModel::findorFail($id)->delete();
        return redirect('adminpanel\events');
    }
}
