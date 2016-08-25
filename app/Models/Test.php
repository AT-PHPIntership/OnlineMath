<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'class_id',
         'name',
        'number_question',
        'created_at',
        'updated_at'
    );

    /**
     *  Tests  has many usertest
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function usertest()
    {
        return $this->hasMany('App\Models\UserTest');
    }
    
    /**
     * Test belongs to a class.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
