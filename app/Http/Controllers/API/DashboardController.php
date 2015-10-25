<?php

namespace Pictunes\Http\Controllers\API;

use Illuminate\Http\Request;
use Pictunes\Http\Requests;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController; // API Controller
use Pictunes\Pictune; // 'Pictune' model
use Pictunes\Tag; // 'Tag' model

class DashboardController extends ApiGuardController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pictune::all();
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

        // return redirect('dashboard');
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
    }
}
