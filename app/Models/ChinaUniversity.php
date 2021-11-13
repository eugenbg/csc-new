<?php

namespace App\Models;

use App\Base\SluggableModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * App\Models\ChinaUniversity
 *
 * @property int $id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $link
 * @property Collection $programs
 * @property Collection $images
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ChinaUniversity extends SluggableModel
{
    public $timestamps = false;

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('china_university', ['china_universitySlug' => $this->slug]);
    }

    public function programs(): HasMany
    {
        return $this->hasMany(ChinaUniProgram::class, 'university_id', 'id');
    }

    public function getPrograms()
    {
        $programsByDegreeAndName = [
            ChinaUniProgram::PROGRAM_TYPE_BACHELOR => [],
            ChinaUniProgram::PROGRAM_TYPE_MASTER => [],
            ChinaUniProgram::PROGRAM_TYPE_DOCTORAL => [],
            ChinaUniProgram::PROGRAM_TYPE_NO_DEGREE => [],
        ];

        /** @var ChinaUniProgram $program */
        foreach ($this->programs as $program) {
            if(!isset($programsByDegreeAndName[$program->type][$program->name])) {
                $programsByDegreeAndName[$program->type][$program->name] = [$program];
            } else {
                $programsByDegreeAndName[$program->type][$program->name][] = $program;
            }
        }

        return $programsByDegreeAndName;
    }

    public function images(): HasMany
    {
        return $this->hasMany(ChinaUniImage::class, 'university_id', 'id');
    }

}
