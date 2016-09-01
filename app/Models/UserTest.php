<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class UserTest extends Model implements Transformable
{
    use TransformableTrait;

 protected $table = 'users_tests';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'test_id',
        'user_id',
        'test_scores',
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

   /**
     * Usertest belongs to a user.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
