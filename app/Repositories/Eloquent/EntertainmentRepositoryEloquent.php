<?php

namespace App\Repositories\Eloquent;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Contracts\Repositories\EntertainmentRepository;
use App\Models\Entertainment;
use App\Validators\EntertainmentValidator;

/**
 * Class EntertainmentRepositoryEloquent
 *
 * @package namespace App\Repositories\Eloquent;
 */
class EntertainmentRepositoryEloquent extends BaseRepository implements EntertainmentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Entertainment::class;
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
