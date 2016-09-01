<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class User extends Model implements Transformable
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
        return $this->hasOne('App\Models\Role');
    }
}
