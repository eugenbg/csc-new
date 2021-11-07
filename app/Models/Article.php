<?php

namespace App\Models;

use App\Base\SluggableModel;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * App\Models\Article
 *
 * @property mixed $title
 * @property mixed $slug
 * @property mixed $category_id
 * @property \Illuminate\Support\Carbon $published_at
 * @property mixed $content
 * @property mixed|string $image
 * @property int $id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Category $category
 * @property-read string $link
 * @property-read string $localized_published_at
 * @method static \Database\Factories\ArticleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article published()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article wherePublishedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends SluggableModel
{
    use HasFactory;

    /**
     * Carbon instance fields
     *
     * @var array
     */
    protected $dates = ['published_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @param $query
     *
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('published_at', '<=', now())->orderBy('published_at', 'desc');
    }

    /**
     * @return string
     */
    public function getLocalizedPublishedAtAttribute(): string
    {
        return $this->published_at->formatLocalized('%e %B %Y');
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * @return string
     */
    public function getLinkAttribute(): string
    {
        return route('slug', ['fallbackPlaceholder' => $this->slug]);
    }

    public function save($options = [])
    {
        if(!isset($this->published_at)) {
            $this->published_at = now();
        }
        parent::save($options);
    }
}
