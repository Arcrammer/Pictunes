<?php

namespace Pictunes\Http\Controllers;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;
use Pictunes\Http\Controllers\Controller;

use Pictunes\User; // 'User' model
use Pictunes\Http\Requests\CreateUser; // 'CreateUser' request
use Illuminate\Database\Eloquent\SoftDeletes; // Don't actually delete records

class UserController extends Controller
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Return a pictuners' pictunes and profile
     *
     * @param username
     * @return \Illuminate\Http\Response
     */
    public function user_pictunes($tld, $username)
    {
      // There's actually a username
      $userRequested = User::where(['username' => $username])->firstOrFail();
      $viewData['pictunes'] = json_encode($userRequested->pictunes()->get());
      return view('pictune.dashboard', $viewData);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUser  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        User::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return User::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Requests\UpdateUserData  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserData $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->delete();
    }
}
