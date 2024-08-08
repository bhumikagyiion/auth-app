<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    protected $fillable = [
        'company_name',
        'company_email',
        'status',
        'mobile',
        'filename',
        'file_path',
        'business_type',
        'city',
        'state',
        'address',
        'description'
    ];

    protected $casts = [
        'business_type' => 'array', // Automatically cast the JSON column to an array
    ];
}
