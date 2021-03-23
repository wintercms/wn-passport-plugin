<?php namespace LukeTowers\Passport;

use Backend\Models\User as BackendUserModel;

// Initial compatibility with Laravel.Passport
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class BackendUser extends BackendUserModel
{
    use HasApiTokens,
        Notifiable;
}
