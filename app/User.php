<?php

namespace Pictunes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract,
  AuthorizableContract,
  CanResetPasswordContract {
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     *  Mass assignable properties
     *
     * @return array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'selfie_name'
    ];

    /**
     * Encrypt the password before sending it to the database
     *
     * @return void
     */
    public function setPasswordAttribute($to) {
        $this->attributes['password'] = bcrypt($to);
    }

    /**
     * Make the email value lower case
     *
     * @return void
     */
    public function setEmailAttribute($to) {
        $this->attributes['email'] = strtolower($to);
    }

    /**
     * Each user has many Pictunes
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    function pictunes() {
        return $this->hasMany('Pictunes\Pictune', 'post_creator');
    }

  /**
   * Get the pictunes from the user with their user information
   *
   * (I was too stupid to figure out how to find an fk in Navicat)
   *
   */
   public function pictunesWithUserInfo($tld, $ofUser)
   {
     $columns = [
       // Defining an array of column values means
       // no tricky EOT whitespace problems.
       'image_name',
       'audio_name',
       'repost_count AS reposts',
       'heart_count AS hearts',
       'pictunes.created_at AS created',
       'pictunes.updated_at AS updated',
       'username AS poster_username',
       'selfie_name AS poster_selfie_name',
       'deleted_at AS poster_deleted_at'
     ];
     return \DB::table('pictunes')
       ->select($columns)
       ->join('followships', 'follows', '=', 'post_creator')
       ->join('users', 'users.id', '=', 'post_creator')
       ->where('username', '=', $ofUser);
   }

    /**
     * Each user belongs to many other users as a follower
     *
     * @return \Illuminate\Database\Eloquent\Relations\
     */
    function pictunesFromUsersFollowing() {
      // Fetch and return the pictunes frome the pictunes
      // this pictuner is following then return them
      $columns = [
        // Defining an array of column values means
        // no tricky EOT whitespace problems.
        'image_name',
        'audio_name',
        'repost_count AS reposts',
        'heart_count AS hearts',
        'pictunes.created_at AS created',
        'pictunes.updated_at AS updated',
        'username AS poster_username',
        'selfie_name AS poster_selfie_name',
        'deleted_at AS poster_deleted_at'
      ];
      return \DB::table('pictunes')
        ->select($columns)
        ->join('followships', 'follows', '=', 'post_creator')
        ->join('users', 'users.id', '=', 'post_creator')
        ->where('follower', '=', Auth::id())
        ->get();
    }
}
