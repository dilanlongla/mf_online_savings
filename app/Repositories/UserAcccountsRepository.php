<?php

namespace App\Repositories;

use App\Models\UserAcccounts;
use App\Repositories\BaseRepository;

/**
 * Class UserAcccountsRepository
 * @package App\Repositories
 * @version October 17, 2021, 8:16 am UTC
*/

class UserAcccountsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'account_id'
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
        return UserAcccounts::class;
    }
}
