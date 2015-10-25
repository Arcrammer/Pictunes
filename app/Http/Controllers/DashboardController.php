<?php

namespace Pictunes\Http\Controllers;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;
use Pictunes\Http\Controllers\Controller;

use Pictunes\Pictune; // 'Pictune' model
use Pictunes\Tag; // 'Tag' model
use Pictunes\Http\Traits\DashboardTrait; // 'DashboardTrait' trait

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "« Dashboard, Pictunes from people the user is following will be here. »";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pictune.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $viewData['pictune'] = Pictune::find($id);
        return view("pictune.withID", $viewData);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $viewData['pictune'] = Pictune::find($id);
        return view("pictune.edit", $viewData);
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
      $pictune = Pictune::findOrFail($id);
      $pictune->fill($request->all());
      return redirect("dashboard");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Pictune::destroy($id);
    }
}
