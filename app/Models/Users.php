<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Users
 * @package App\Models
 * @version October 17, 2021, 8:16 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection $depts
 * @property \Illuminate\Database\Eloquent\Collection $transactions
 * @property \Illuminate\Database\Eloquent\Collection $userAccounts
 * @property string $name
 * @property string $email
 * @property string|\Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property string $first_name
 * @property string $last_name
 * @property string $matricule
 * @property string $nic
 * @property string $address
 * @property string $tel
 * @property string $occupation
 */
class Users extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'users';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'remember_token',
        'first_name',
        'last_name',
        'matricule',
        'nic',
        'address',
        'tel',
        'occupation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'email' => 'string',
        'email_verified_at' => 'datetime',
        'password' => 'string',
        'remember_token' => 'string',
        'first_name' => 'string',
        'last_name' => 'string',
        'matricule' => 'string',
        'nic' => 'string',
        'address' => 'string',
        'tel' => 'string',
        'occupation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'email' => 'nullable|string|max:255',
        'email_verified_at' => 'nullable',
        'password' => 'nullable|string|max:255',
        'remember_token' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable',
        'first_name' => 'nullable|string|max:255',
        'last_name' => 'nullable|string|max:255',
        'matricule' => 'nullable|string|max:255',
        'nic' => 'nullable|string|max:255',
        'address' => 'nullable|string|max:255',
        'tel' => 'nullable|string|max:255',
        'occupation' => 'nullable|string|max:255',
        'deleted_at' => 'nullable'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function depts()
    {
        return $this->hasMany(\App\Models\Dept::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transactions()
    {
        return $this->hasMany(\App\Models\Transaction::class, 'collector_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function userAccounts()
    {
        return $this->hasMany(\App\Models\UserAccount::class, 'user_id');
    }
}
