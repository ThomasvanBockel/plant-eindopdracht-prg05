<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plant extends Model
{
    use SoftDeletes;

    /*
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
