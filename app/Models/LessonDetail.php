<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LessonDetail extends Model
{
    protected $table = 'lessons_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'user_id',
        'lesson_id',
        'number_lesson',
        'created_at',
        'updated_at'
    );

    /**
     * Lessondetail belongs to a user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Lessondetail belongs to a lesson.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo('App\Models\Lesson');
    }
}
