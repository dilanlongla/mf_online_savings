<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class ActivityLog
 * @package App\Models
 * @version October 17, 2021, 8:14 am UTC
 *
 * @property string $log_name
 * @property string $description
 * @property string $subject_type
 * @property integer $subject_id
 * @property string $causer_type
 * @property integer $causer_id
 * @property string $properties
 */
class ActivityLog extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'activity_log';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'log_name',
        'description',
        'subject_type',
        'subject_id',
        'causer_type',
        'causer_id',
        'properties'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'log_name' => 'string',
        'description' => 'string',
        'subject_type' => 'string',
        'subject_id' => 'integer',
        'causer_type' => 'string',
        'causer_id' => 'integer',
        'properties' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'log_name' => 'nullable|string|max:255',
        'description' => 'required|string',
        'subject_type' => 'nullable|string|max:255',
        'subject_id' => 'nullable',
        'causer_type' => 'nullable|string|max:255',
        'causer_id' => 'nullable',
        'properties' => 'nullable|string',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
