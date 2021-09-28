<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Transaction
 * @package App\Models
 * @version September 19, 2021, 4:03 pm UTC
 *
 * @property string $ref
 * @property string $is_in
 * @property integer $collector_id,
 * @property number $fee
 * @property number $amount
 * @property string $status
 * @property integer $account
 */
class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transactions';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ref',
        'is_in',
        'collector_id',
        'fee',
        'amount',
        'status',
        'account_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'ref' => 'string',
        'is_in' => 'string',
        'collector_id' => 'integer',
        'fee' => 'float',
        'amount' => 'float',
        'status' => 'string',
        'account_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'is_in' => 'required',
        'account_id' => 'required',
        'amount' => 'required'
    ];
}
