<?php

namespace App\Http\Controllers;

use App\Models\EventsModel;
use App\Models\PartnersModel;
use App\Models\UserEventsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class Events extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventModel = new EventsModel();
        //$eventObj = $eventModel->where('event_date','>=',date('Y-m-d'))->where('event_time','>=',date('H:i:s'))->paginate(10);
        $eventObj = $eventModel->inRandomOrder()->paginate(10);
        $partnerObj = PartnersModel::all();
        return view('pages.events.index',compact('eventObj'),['partnerObj'=>$partnerObj]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $eventObj = EventsModel::where('id',$id)->get();
        $userSignedUp=[];
        if(empty($eventObj->first()))
        {
            return back()->with('status', trans('No Events found'));
        }
        foreach($eventObj as $eventRow)
        {
            $event = $eventRow;
        }
        if(!empty(Auth::user()->id))
        {
            $userSignedObj = UserEventsModel::where('user_id',Auth::user()->id)->get();
            if(!empty($userSignedObj->first()))
            {
                $userSignedUp = 'registered';
            }
        }
        return view('pages.events.details',compact('event'),['userSignedUp'=>$userSignedUp]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function signUp(Request $request)
    {
        $input = $request->all();
        if (empty(Auth::user()->id)) {
            return response()->json([
                    'status'=>'failed',
                    'msg'=>'You need to logged in',
                    'id'=>$input['id']
                ]
            );
        }
        $insertArr = [
            'user_id'=>Auth::user()->id,
            'event_id'=>$input['id']
        ];
        UserEventsModel::create($insertArr);
        return response()->json([
            'status'=>'success',
            'msg'=>'Thank you for Sign Up',
            'id'=>$input['id']
            ]);
    }
}
