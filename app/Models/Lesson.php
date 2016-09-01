<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Lesson extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'class_id',
        'category_id',
        'name',
        'index',
        'page',
        'description',
        'created_at',
        'updated_at'
    );
     /**
     * Lesson belongs to Categorylesson.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categorylesson()
    {
        return $this->belongsTo('App\Models\CategoryLesson');
    }
 
    /**
     * Categorylesson belongs to class.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }

    /**
     * Lesson has many testlesson
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function testlesson()
    {
        return $this->hasMany('App\Models\TestLesson');
    }

    /**
     * Lesson has many lessondetail
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessondetail()
    {
        return $this->hasMany('App\Models\LessonDeatail');
    }
}
