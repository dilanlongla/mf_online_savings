<?php

namespace App\Repositories;

use App\Models\Dept;
use App\Repositories\BaseRepository;

/**
 * Class DeptRepository
 * @package App\Repositories
 * @version September 19, 2021, 3:42 pm UTC
*/

class DeptRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'amount',
        'status'
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
        return Dept::class;
    }
}
