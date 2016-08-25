<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryLesson extends Model
{
    protected $table = 'categories_lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'name',
        'created_at',
        'updated_at'
    );
    /**
     * Categorylesson has many Lesson
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lesson()
    {
        return $this->hasMany('App\Models\Lesson');
    }
}
