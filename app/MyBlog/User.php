<?php

namespace MyBlog;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
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


    /**
     * [created_at]的mutator
     *
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value): string
    {
        $locale = App::getLocale();

        $date = $this->asDateTime($value);

        if ($locale === 'uk') {
            return $date->format('d M, Y');
        } elseif ($locale === 'tw') {
            return $date->format('Y/m/d');
        } else {
            return $date->format('M d, Y');
        }
    }
}
