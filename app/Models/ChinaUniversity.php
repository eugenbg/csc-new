<?php

namespace App\Models;

use App\Base\SluggableModel;

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
    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('china_university', ['china_universitySlug' => $this->slug]);
    }
}
