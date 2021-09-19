<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Account
 * @package App\Models
 * @version September 19, 2021, 2:42 pm UTC
 *
 * @property string $name
 * @property string $description
 */
class Account extends Model
{
    use SoftDeletes;

    use HasFactory;

    public $table = 'accounts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|max:50'
    ];

    
}
