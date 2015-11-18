<?php

namespace Pictunes;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
  /**
   * Mass assignable properties
   */
  protected $fillable = ['name'];

  /**
   * Tags belong to many Pictunes
   */
  function pictunes() {
    return $this->belongsToMany('Pictunes\Pictune');
  }
}
