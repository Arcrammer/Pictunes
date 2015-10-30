<?php

namespace Pictunes\Http\Traits;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;
use Pictunes\Http\Controllers\Controller;

use Pictunes\Pictune; // 'Pictune' model
use Pictunes\Tag; // 'Tag' model

trait DashboardTrait {
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
        'image_name' => $submittedData['image_name'],
        'audio_name' => $submittedData['audio_name']
      ];

      // Create the pictune object
      $pictune = new Pictune($recordData);

      // Save it
      $pictune->save();

      // Set the creators' username
      $pictune->creator()->attach($recordData['post_creator']);

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

      return redirect('dashboard');
  }
}
