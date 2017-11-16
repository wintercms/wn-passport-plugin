<?php namespace LukeTowers\Passport;

use Backend\Models\User as BackendUserModel;

// Authenticates the user for logging in and manages the remember token
// Initial compatibility with Illumninate.Auth
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

// Initial compatibility with Laravel.Passport
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

// Manages the user's access to the application using Laravel's concept
// of 'Gates' & 'Policies'. See https://laravel.com/docs/5.5/authorization
// A parallel could in theory be constructed to use October's permission
// system
// use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
// use Illuminate\Foundation\Auth\Access\Authorizable;

// Triggers sending a password reset notification for the user
// use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
// use Illuminate\Auth\Passwords\CanResetPassword;

class BackendUser extends BackendUserModel implements AuthenticatableContract
{
    use Authenticatable,
        HasApiTokens,
        Notifiable;

    /**
     * The column name of the "remember me" token.
     *
     * @var string
     */
    protected $rememberTokenName = 'persist_code';


}
