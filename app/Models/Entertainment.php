<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entertainment extends Model
{
    protected $table = 'extertainments';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = array(
        'id',
        'name',
        'description',
        'time',
        'created_at',
        'updated_at'
    );
}
