<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\UserTestRepository;
use App\Models\UserTest;
use App\Validators\UserTestValidator;

/**
 * Class UserTestRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class UserTestRepositoryEloquent extends BaseRepository implements UserTestRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return UserTest::class;
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
