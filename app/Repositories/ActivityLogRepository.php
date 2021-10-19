<?php

namespace App\Repositories;

use App\Models\ActivityLog;
use App\Repositories\BaseRepository;

/**
 * Class ActivityLogRepository
 * @package App\Repositories
 * @version October 17, 2021, 8:14 am UTC
*/

class ActivityLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties'
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
        return ActivityLog::class;
    }
}
