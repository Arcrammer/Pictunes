<?php

namespace Pictunes\Http\Controllers\API;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController; // API Controller
use Pictunes\User; // 'User' model
use Pictunes\Http\Requests\CreateUser; // 'CreateUser' request

class UserController extends ApiGuardController
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("user.create");
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
        return redirect('user');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData['user'] = User::findOrFail($id);
        return view("user.edit", $viewData);
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
        return redirect("user");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $viewData['user'] = User::findOrFail($id);
        return view("user.delete", $viewData);
    }
}
