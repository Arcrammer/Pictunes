<?php

namespace Pictunes;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

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
}
