<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ChinaScholarship
 * @property mixed $type
 */
class ChinaScholarship extends Model
{
    protected $table = 'uni_scholarships';
    public $timestamps = false;

    /**
     * Get the University that owns this program.
     */
    public function uni(): BelongsTo
    {
        return $this->belongsTo(ChinaUniversity::class, 'university_id');
    }
}
