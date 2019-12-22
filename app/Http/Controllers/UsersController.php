<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('admin');
        ///will use if we want to remove all the functions in the UserController from users which are not admin's.
    }

    public function index()
    {
        //
        return view('admin.users.index')->with('users', User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
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
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
        ]);

        $user = User::create([
           'name' => $request->name,
           'email' => $request->email,
            'password' => bcrypt('password'),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg'
        ]);

        session()->flash('success', 'User Added Permanently.');

        return redirect()->route('users');
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

        $user = User::find($id);

        $user->profile->delete();
        $user->delete();

        session()->flash('success', 'User Deleted Permenantly!');

        return redirect()->back();

    }

    public function admin($id)
    {
        $user = User::find($id);

        $user->admin = 1;

        $user->save();

        session()->flash('success', 'Successfully changed user permission.');

        return redirect()->back();
    }

    public function not_admin($id)
    {
        $user = User::find($id);

        $user->admin = 0;

        $user->save();

        session()->flash('success', 'Successfully changed user permission.');

        return redirect()->back();
    }
}
