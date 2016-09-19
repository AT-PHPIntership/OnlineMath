<?php

namespace App\Models;

use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use TransformableTrait;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = array(
        'id',
        'role_id',
        'group_id',
        'name',
        'username',
        'password',
        'birthday',
        'gender',
        'address',
        'created_at',
        'updated_at'
    );

     /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * User belongs to a group.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    /**
     * User has many testuser
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testuser()
    {
        return $this->hasMany('App\Models\TestUser');
    }

     /**
     * User has a role.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function role()
    {
        return $this->hasOne('App\Models\Role', 'id', 'role_id');
    }

    /**
     * User has roles
     *
     * @param Array $roles all roles we need check
     *
     * @return boolean has Role
     */
    public function hasRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->checkIfUserHasRole($role)) {
                    return true;
                }
            }
        } else {
            return $this->checkIfUserHasRole($roles);
        }
        return false;
    }
    /**
     * Check if user has role
     *
     * @param String $role name attribute of \App\Models\Role
     *
     * @return boolean
     */
    private function checkIfUserHasRole($role)
    {

        return (strtolower($role) == strtolower($this->role->name)) ? true: false;
    }
    /**
     * Format the date field in access
     *
     * @param string $date date input
     *
     * @return void
     */
    public function setBirthdayAttribute($date)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat(\Config::get('common.DATE_DMY_FORMAT'), $date)->toDateString();
    }
    /**
     * Format the date to d/m/Y
     *
     * @param string $date date
     *
     * @return void
     */
    public function getBirthdayAttribute($date)
    {
        return Carbon::parse($date)->format(\Config::get('common.DATE_DMY_FORMAT'));
    }
}
