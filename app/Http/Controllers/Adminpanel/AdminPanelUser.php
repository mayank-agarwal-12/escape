<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use App\Models\AdminPanelUserModel;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPanelUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adminUserObj = AdminPanelUserModel::all();
        return view('pages.adminpanel.adminuser.index',compact('adminUserObj'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.adminpanel.adminuser.create',compact(''));
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
        $input['password'] = bcrypt($input['password']);
        $input['status'] = $input['status'] == 0 ? 'active' : 'inactive';
        AdminPanelUserModel::create($input);
        return redirect('adminpanel/adminuser');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $adminUserObj = AdminPanelUserModel::findorFail($id);
        $adminUserObj->status = $adminUserObj->status == 'active' ? 0 : 1;
        return view('pages.adminpanel.adminuser.edit',compact('adminUserObj'));
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
        $adminUserObj = AdminPanelUserModel::findorFail($id);
        $input = $request->all();
        $input['status'] = $input['status'] == 0 ? 'active' : 'inactive';
        $adminUserObj->update($input);
        return redirect('adminpanel/adminuser');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AdminPanelUserModel::findorFail($id)->delete();
        return redirect('adminpanel/adminuser');
    }

    /*protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }*/
}
