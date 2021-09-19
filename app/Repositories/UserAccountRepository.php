<?php

namespace App\Repositories;

use App\Models\UserAccount;
use App\Repositories\BaseRepository;

/**
 * Class UserAccountRepository
 * @package App\Repositories
 * @version September 19, 2021, 3:50 pm UTC
*/

class UserAccountRepository extends BaseRepository
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
        return UserAccount::class;
    }
}
