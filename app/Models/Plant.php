<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{/*
    protected $fillable = [
        'name',
        'description',
        'category_id',
        'active', // ← add this line
    ];

    protected $casts = [
        'active' => 'boolean',
    ];
*/
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
