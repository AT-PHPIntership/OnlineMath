<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Group extends Model implements Transformable
{
    use TransformableTrait;

   protected $table = 'groups';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'name',
        'description',
        'created_at',
        'updated_at'
    );

   /**
     * Group has many test
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function test()
    {
    
        return $this->hasMany('App\Models\Test');
    }

    /**
     * Group has many lesson
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lesson()
    {
    
        return $this->hasMany('App\Models\Lesson');
    }

    /**
     * Group has many
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
    
        return $this->hasMany('App\Models\User');
    }

    /**
     * Group has many Book
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book()
    {
        return $this->hasMany('App\Models\Book');
    }

}
