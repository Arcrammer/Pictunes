<?php

namespace Pictunes;

use Illuminate\Database\Eloquent\Model;

class Pictune extends Model {
    /**
     * Mass assignable properties
     */
    protected $fillable = [
      'post_creator',
      'image_name',
      'audio_name'
    ];

    /**
    * Pictunes have only one post creator
     */
    function creator() {
      return $this->belongsToMany('Pictunes\User', 'pictune_creator', 'post_creator', 'pictune_id')->withTimestamps();
    }

    /**
     * Pictunes have multiple tags
     */
    function tags() {
      return $this->belongsToMany('Pictunes\Tag')->withTimestamps();
    }
}
