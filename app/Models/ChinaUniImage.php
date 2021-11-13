<?php

namespace App\Models;

use App\Base\SluggableModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ChinaUniProgram
 * @property mixed $type
 */
class ChinaUniImage extends SluggableModel
{
    protected $table = 'uni_images';
    public $timestamps = false;

    const TYPE_CAMPUS = 'campus';
    const TYPE_DORM = 'dorm';

    /**
     * Get the University that owns this program.
     */
    public function uni(): BelongsTo
    {
        return $this->belongsTo(ChinaUniversity::class, 'university_id');
    }
}
