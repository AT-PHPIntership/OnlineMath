<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'name'
    );

    /**
     * Role has many Users
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany('App\Models\User');
    }
}
