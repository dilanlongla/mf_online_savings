<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Dept
 * @package App\Models
 * @version September 19, 2021, 3:42 pm UTC
 *
 * @property number $amount
 * @property string $status
 */
class Dept extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'depts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'amount',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'amount' => 'float',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'amount' => 'required',
        'status' => 'required'
    ];

    
}
