<?php

namespace Pictunes;

use Illuminate\Database\Eloquent\Model;

class Followship extends Model
{
    function follower() {
      return $this->belongsToMany('Pictunes\User');
    }
}
