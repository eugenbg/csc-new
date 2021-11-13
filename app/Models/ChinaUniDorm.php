<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChinaUniDorm
 * @property mixed $type
 */
class ChinaUniDorm extends Model
{
    protected $table = 'uni_dorms';
    public $timestamps = false;

    /**
     * Get the University that owns this program.
     */
    public function uni(): BelongsTo
    {
        return $this->belongsTo(ChinaUniversity::class, 'university_id');
    }
}
