<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Question extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'questions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'test_id',
        'question',
        'answer',
        'created_at',
        'updated_at'
    );

    /**
     * Usertest belongs to a test.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }
}
