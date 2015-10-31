<?php

namespace Pictunes\Http\Controllers\API;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController; // API Controller
use Pictunes\Pictune; // 'Pictune' model
use Pictunes\User; // 'User' model
use Pictunes\Tag; // 'Tag' model
use Pictunes\Follower; // 'Follower' model
use Auth; // Authentication

class DashboardController extends ApiGuardController
{
    use \Pictunes\Http\Traits\DashboardTrait; // 'DashboardTrait' trait
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user();
        // $followees = Follower::where('follower','=', $current_user_id)->get();
        // $pictunes_from_users_following = [];
        // foreach ($followees as $followee) {
        //   $followee_id = $followee["followee"];
        //   $user = User::find($followee_id);
        //   $pictunes = $user->pictunes;
        //   foreach ($pictunes as $pictune) {
        //     $pictune["post_creator"] = $user->username;
        //     array_push($pictunes_from_users_following, $pictune);
        //   }
        // }

        // $current_user->following();
        // foreach ($person_following) {
        //   $person_following
        // }
        // foreach ($pictunes as $pictune) {
        //   // Set the username
        //   $userId = $pictune["post_creator"];
        //   $user["id"]
        // }
        // $response = response(json_encode($pictunes_from_users_following));
        // $response->header("Content-Type", "application/json");
        // return $response;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return Pictune::find($id);
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
