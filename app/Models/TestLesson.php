<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestLesson extends Model
{
    protected $table = 'tests_lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'lesson_id',
        'number_question',
        'answer',
        'created_at',
        'updated_at'
    );
    /**
     * Teslesson belongs to a lesson.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson', 'lesson_id');
    }
}
