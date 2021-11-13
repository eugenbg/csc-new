<?php

namespace App\Models;

use App\Base\SluggableModel;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\ChinaUniProgram
 * @property mixed $type
 * @property mixed $name
 */
class ChinaUniProgram extends SluggableModel
{
    protected $table = 'uni_programs';
    public $timestamps = false;

    const PROGRAM_TYPE_BACHELOR = 'Bachelor';
    const PROGRAM_TYPE_MASTER = 'Master';
    const PROGRAM_TYPE_DOCTORAL = 'Doctoral';
    const PROGRAM_TYPE_NO_DEGREE = 'No-Degree';

    const PROGRAM_TYPES = [
        self::PROGRAM_TYPE_BACHELOR,
        self::PROGRAM_TYPE_MASTER,
        self::PROGRAM_TYPE_DOCTORAL,
        self::PROGRAM_TYPE_NO_DEGREE,
    ];

    /**
     * Get the University that owns this program.
     */
    public function uni(): BelongsTo
    {
        return $this->belongsTo(ChinaUniversity::class, 'university_id');
    }

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('china_uni_program', ['china_uni_program_Slug' => $this->slug]);
    }

    public function getTypeAttribute()
    {
        return str_replace(' ', '-', $this->attributes['type']);
    }
}
