<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Transaction
 * @package App\Models
 * @version October 17, 2021, 7:54 am UTC
 *
 * @property \App\Models\UserAccount $account
 * @property \App\Models\User $collector
 * @property string $ref
 * @property string $is_in
 * @property number $fee
 * @property number $amount
 * @property string $status
 * @property integer $collector_id
 * @property integer $account_id
 */
class Transaction extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'transactions';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'ref',
        'is_in',
        'fee',
        'amount',
        'status',
        'collector_id',
        'account_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'ref' => 'string',
        'is_in' => 'string',
        'fee' => 'float',
        'amount' => 'float',
        'status' => 'string',
        'collector_id' => 'integer',
        'account_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'ref' => 'nullable|string|max:255',
        'is_in' => 'nullable|string|max:255',
        'fee' => 'nullable|numeric',
        'amount' => 'nullable|numeric',
        'status' => 'nullable|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'deleted_at' => 'nullable',
        'collector_id' => 'nullable',
        'account_id' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function account()
    {
        return $this->belongsTo(\App\Models\UserAccount::class, 'account_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function collector()
    {
        return $this->belongsTo(\App\Models\User::class, 'collector_id');
    }
}
