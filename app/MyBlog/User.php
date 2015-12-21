<?php

namespace MyBlog;

use Carbon\Carbon;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\App;

class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var string
     */
    protected $hidden = ['password', 'remember_token'];

    public function getCreatedAtAttribute($value)
    {
        $locale = App::getLocale();

        $date = $this->asDateTime($value);

        if ($locale === 'uk') {
            return $date->format('d, M, Y');
        } else if ($locale == 'tw') {
            return $date->format('Y, m, d');
        } else {
            return $date->format('M, d, Y');
        }
    }
}
