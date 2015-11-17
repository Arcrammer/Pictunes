<?php

namespace Pictunes\Http\Traits;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;
use Pictunes\Http\Controllers\Controller;

use Auth;
use Pictunes\Pictune; // 'Pictune' model
use Pictunes\User; // 'User' model
use Pictunes\Tag; // 'Tag' model

trait DashboardTrait {
  /**
   * Return all of the Pictunes from the pictuners the user follows
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      if (Auth::check()) {
        if (strpos($request->url(), "api.pictunes.") !== false) {
          // The user has logged in and the request expects
          // JSON. The url is 'api.pictunes.{tld}'; Return
          // pictunes from the people this pictuner follows
          return Auth::user()->pictunesFromUsersFollowing();
        } else {
          // The request expects a view. The url is not
          // 'api.pictunes.{tld}', and the user has
          // successfully logged in; Return  pictunes
          // from the people this pictuner follows
          $viewData['pictunes'] = json_encode(Auth::user()->pictunesFromUsersFollowing());
          return view('pictune.dashboard', $viewData);
        }
      }

      if (!Auth::check()) {
        // The user has not logged in; Treat
        // them as a prospective user
        return redirect('http://pictunes.' . env('TLD') . '/auth/register');
      }
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
      $submittedData = $request->all();

      $recordData = [
        'post_creator' => $submittedData['post_creator'],
        'image_name' => uniqid() . preg_replace("/[^a-zA-Z0-9]+/", "", $submittedData['image_name']) . "." . $request->file('image_name')->getClientOriginalExtension(),
        'audio_name' => uniqid() . preg_replace("/[^a-zA-Z0-9]+/", "", $submittedData['audio_name']) . "." . $request->file('audio_name')->getClientOriginalExtension()
      ];

      // Create the pictune object
      $pictune = new Pictune($recordData);

      if ($request->file('image_name')->isValid() && $request->file('audio_name')->isValid()) {
        $image = $request->file('image_name');
        // Both files were submitted; Resize the images and trim the audio length
        switch (getimagesize($image)['mime']) {
          case "image/jpeg":
            $imagecreate = "imagecreatefromjpeg";
            $imagesave = "imagejpeg";
            break;
          case "image/png":
            $imagecreate = "imagecreatefrompng";
            $imagesave = "imagepng";
            break;
          case "image/gif":
            $imagecreate = "imagecreatefromgif";
            $imagesave = "imagegif";
            break;
        }

        // ---------- ---------- ---------- ---------- ----------
        // Poor and broken implementation of image cropping
        // ---------- ---------- ---------- ---------- ----------
        //
        // // Submitted image data
        // $uneditedImage = $imagecreate($image);
        // $uneditedImageWidth = imagesx($uneditedImage);
        // $uneditedImageHeight = imagesy($uneditedImage);
        // $uneditedImageRatio = $uneditedImageWidth / $uneditedImageHeight;
        //
        // // Production ready image data
        // $productionReadyImage = imagecreatetruecolor(1024, 1024);
        // $productionReadyWidth = 1024;
        // $productionReadyHeight = 1024;
        // $productionReadyImageRatio = $productionReadyWidth / $productionReadyHeight;
        //
        // if ($uneditedImageRatio < $productionReadyImageRatio) {
        //   // The submitted image is taller than it needs to be
        //   if ($uneditedImageHeight > $productionReadyHeight) {
        //     // The image is too tall
        //     $uneditedImageHeight = $productionReadyHeight;
        //     $uneditedImageWidth = ciel($uneditedImageHeight / $uneditedImageRatio);
        //   }
        // } else if ($uneditedImageWidth > $productionReadyWidth) {
        //   // The submitted image is wider than it needs to be
        //   $uneditedImageWidth = $productionReadyWidth;
        //   $uneditedImageHeight = ceil($uneditedImageWidth / $uneditedImageRatio);
        // }
        // imagecopyresized(
        //   $productionReadyImage, $uneditedImage,
        //   0, 0, 0, 0,
        //   $productionReadyWidth, $productionReadyHeight,
        //   $uneditedImageWidth, $uneditedImageHeight
        // );
        //
        // // Save them to the filesystem
        // $imagesave($productionReadyImage, public_path() . '/pictune_assets/images/' . $recordData['image_name']);

        $request->file('audio_name')->move(public_path() . '/pictune_assets/audio', $recordData['audio_name']);
      }

      // Save the pictune to the database
      $pictune->save();

      // Set the tags on the pictune
      $tags = $submittedData['tags'];
      $recordTags = [];
      $tags = explode(",", $tags);
      $submittedData['tags'] = [];
      foreach ($tags as $tag) {
        array_push($recordTags, trim($tag));
        $existingTag = Tag::where(['name' => $tag])->first();
        if (is_null($existingTag)) {
          // The tag has not been created already
          $newlyCreatedTag = Tag::create(['name' => $tag]);
          $pictune->tags()->attach($newlyCreatedTag->id);
        } else {
          $pictune->tags()->attach($existingTag->id);
        }
      }

      return redirect('/');
  }

  /**
   * Show a users' profile and pictunes
   *
   * @param username
   * @return \Illuminate\Http\Response
   */
  public function user_pictunes($tld, $username)
  {
    $viewData['pictunes'] = json_encode(
      User::where(['username' => $username])
        ->firstOrFail()
        ->pictunesWithUserInfo($tld, $username)
        ->get()
      );
    return view('pictune.dashboard', $viewData);
  }
}
