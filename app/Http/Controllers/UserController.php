<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $User = User::all();
        return response()->json(['Users' => $User], 200);
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
        $request->validate([
            'username' => 'required|max:191',
            'password' => 'required|max:191',
            'email' => 'required|max:191',
            'phone' => 'required|max:191',
            'avatar' => 'required|max:191',
            'address' => 'required|max:191',
            'birthday' => 'required|max:191',
            'user_type_id' => 'required|max:191',
        ]);

        $User = new User;
        $User->username = $request->username;
        $User->password = $request->password;
        $User->email = $request->email;
        $User->user_type_id = $request->user_type_id;
        $User->save();
        return response()->json(['message' => 'User Add Successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $User = User::find($id);
        if ($User) {
            return response()->json(['User' => $User], 200);
        } else {
            return response()->json(['message' => 'No User Found'], 404);
        }
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
        /* $User = User::find($id);
        $User->update($request->all());
        return $User ;*/
        $request->validate([
            'username' => 'required|max:191',
            'fullname' => 'required|max:191',
            'password' => 'required|max:191',
            'email' => 'required|max:191',
            'phone' => 'required|max:191',
            'avatar' => 'required|max:191',
            'address' => 'required|max:191',
            'birthday' => 'required|max:191',
            'user_type_id' => 'required|max:191',

        ]);

        $User = User::find($id);
        if ($User) {
            $User->username = $request->username;
            $User->fullname = $request->fullname;
            $User->password = $request->password;
            $User->email = $request->email;
            $User->phone = $request->phone;
            $User->avatar = $request->avatar;
            $User->address = $request->address;
            $User->birthday = $request->birthday;
            $User->user_type_id = $request->user_type_id;
            $User->update();
            return response()->json(['message' => 'User Update Successfully'], 200);
        } else {
            return response()->json(['message' => 'User Update Unsuccessfully'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        if ($User) {
            $User->delete();
            return response()->json(['message' => 'User Delete Successfully'], 200);
        } else {
            return response()->json(['message' => 'User Delete Unsuccessfully'], 404);
        }
    }
}
