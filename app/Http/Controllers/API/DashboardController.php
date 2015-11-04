<?php

namespace Pictunes\Http\Controllers\API;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController; // API Controller
use Pictune; // 'Pictune' model
use Auth; // Authentication

class DashboardController extends ApiGuardController
{
    use \Pictunes\Http\Traits\DashboardTrait; // 'DashboardTrait' trait
    
    /**
     * Return a particular pictune
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Pictune::find($id);
    }

    /**
     * Update the pictunes' data
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pictune = Pictune::findOrFail($id);
        $pictune->fill($request->all());
    }

    /**
     * Delete a pictune
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pictune::destroy($id);
    }
}
