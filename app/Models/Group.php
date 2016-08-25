<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'group';

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
     * Class has many test
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function test()
    {
    
        return $this->hasMany('App\Models\Test');
    }

    /**
     * Class has many lesson
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lesson()
    {
    
        return $this->hasMany('App\Models\Lesson');
    }

    /**
     * Class has many
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
    
        return $this->hasMany('App\Models\User');
    }

    /**
     * Category has many Product
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function book()
    {
        return $this->hasMany('App\Models\Book');
    }
}
