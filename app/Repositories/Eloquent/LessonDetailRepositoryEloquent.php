<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\LessonDetailRepository;
use App\Models\LessonDetail;
use App\Validators\LessonDetailValidator;

/**
 * Class LessonDetailRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class LessonDetailRepositoryEloquent extends BaseRepository implements LessonDetailRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return LessonDetail::class;
    }

    
    /**
     * Boot up the repository, pushing criteria
     *
     * @return string
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
