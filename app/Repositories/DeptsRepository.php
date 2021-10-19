<?php

namespace App\Repositories;

use App\Models\Depts;
use App\Repositories\BaseRepository;

/**
 * Class DeptsRepository
 * @package App\Repositories
 * @version October 17, 2021, 8:15 am UTC
*/

class DeptsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'status',
        'user_id'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Depts::class;
    }
}
