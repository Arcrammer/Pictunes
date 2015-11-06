<?php

namespace Pictunes\Http\Controllers\API;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController; // API Controller
use \Pictunes\Pictune; // 'Pictune' model
use Auth; // Authentication

class DashboardController extends ApiGuardController
{
    use \Pictunes\Http\Traits\DashboardTrait; // 'DashboardTrait' trait

    /**
     * Return an image for a particular pictune
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function image($tld, $id)
    {
      $imagePath = "pictune_assets/images/" . Pictune::find($id)->image_name;
      $imageInfo = finfo_open(FILEINFO_MIME_TYPE);
      $mimeType = finfo_file($imageInfo, $imagePath);
      header("Content-Type: " . $mimeType);
      return response(readfile($imagePath));
    }

    /**
     * Return a particular pictune
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($tld, $id)
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
    public function destroy($tld, $id)
    {
        Pictune::destroy($id);
    }
}
