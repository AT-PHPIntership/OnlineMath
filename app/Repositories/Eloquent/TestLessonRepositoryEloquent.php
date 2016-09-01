<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\TestLessonRepository;
use App\Models\TestLesson;
use App\Validators\TestLessonValidator;

/**
 * Class TestLessonRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class TestLessonRepositoryEloquent extends BaseRepository implements TestLessonRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return TestLesson::class;
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
