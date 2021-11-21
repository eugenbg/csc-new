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
 * @property Collection $dorms
 * @property Collection $scholarships
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
 * @property string $name
 * @property string $region
 * @property-read int|null $dorms_count
 * @property-read int|null $images_count
 * @property-read int|null $programs_count
 * @property-read int|null $scholarships_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChinaUniversity whereRegion($value)
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

    public function dorms(): HasMany
    {
        return $this->hasMany(ChinaUniDorm::class, 'university_id', 'id');
    }

    public function scholarships(): HasMany
    {
        return $this->hasMany(ChinaScholarship::class, 'university_id', 'id');
    }

}
