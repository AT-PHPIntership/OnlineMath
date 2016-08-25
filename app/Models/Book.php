<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Book extends Model
{
    protected $table = 'books';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'class_id',
        'category_id'
        'name',
        'author',
        'description',
        'created_at',
        'updated_at'
    );
     
    /**
     * Book belongs to Category.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    /**
     * Book belongs to a class.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('App\Models\Group');
    }
}
