<?php

namespace Pictunes\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as BaseVerifier;
use Request;

class VerifyCsrfToken extends BaseVerifier
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
      //
    ];

    function __construct() {
      // Because the 'is()' method relies on the 'path()' method
      // which only gets the path of the URL (e.g '/auth/register')
      // we'll compare it to the entire URL instead since we're
      // really interested in whether the subdomain is a certain
      // value. If it is, we append the current path to '$except'
      //
      if (strpos(Request::url(), "api.pictunes.") !== false) {
        \Log::debug('true');
        array_push($this->except, Request::path());
      }
    }
}
