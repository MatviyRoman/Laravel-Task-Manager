<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
        'created_at',
    ];

    protected $casts = [
        'status' => 'string',
    ];
}
