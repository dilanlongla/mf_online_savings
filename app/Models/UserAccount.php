<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class UserAccount
 * @package App\Models
 * @version September 19, 2021, 3:50 pm UTC
 *
 * @property integer $user_id
 * @property integer $account_id
 */
class UserAccount extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'user_accounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'account_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'account_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'account_id' => 'required'
    ];

    
}
