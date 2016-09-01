<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\CategoryLessonRepository;
use App\Models\CategoryLesson;
use App\Validators\CategoryLessonValidator;

/**
 * Class CategoryLessonRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryLessonRepositoryEloquent extends BaseRepository implements CategoryLessonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return CategoryLesson::class;
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
