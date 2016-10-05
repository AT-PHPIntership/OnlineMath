<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class TestLesson extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'tests_lessons';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'lesson_id',
        'question',
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
    /**
      * Compare array
      *
      * @param array $array1 array1
      * @param array $array2 array2
      *
      * @return \Illuminate\Http\Response
      */
    public static function scores($array1, $array2)
    {
        $count = count($array2);
        $score =0;
        for ($i =1; $i< $count; $i++) {
            if ($array1[$i]==$array2[$i]) {
                $score++;
            }
        }
        return $score;
    }
}
