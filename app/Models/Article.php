<?php

namespace App\Models;

use App\Base\SluggableModel;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @property mixed $title
 * @property mixed $slug
 * @property mixed $category_id
 * @property \Illuminate\Support\Carbon $published_at
 * @property mixed $content
 * @property mixed|string $image
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
        return route('article', ['aSlug' => $this->slug]);
    }

    public function save($options = [])
    {
        if(!isset($this->published_at)) {
            $this->published_at = now();
        }
        parent::save($options);
    }
}
