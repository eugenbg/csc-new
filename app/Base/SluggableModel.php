<?php

namespace App\Base;

use App\Models\Slug;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

/**
 * App\Base\SluggableModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel whereSlug($slug)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel query()
 *
 * @property string $slug
 * @property int $id
 */
class SluggableModel extends Model
{

    /**
     * @param array $options
     * @return bool
     */
    public function save($options = [])
    {
        $slugModel = Slug::where('slug', '=', $this->slug)->first();
        if(!$slugModel) {
            $slugModel = new Slug();
            $slugModel->type = get_class($this);
            $slugModel->object_id = $this->id;
            $slugModel->slug = $this->slug;
            $slugModel->save();
        }

        if($slugModel
            && ($slugModel->object_id != $this->id || $slugModel->type != get_class($this))
        ) {
            throw new BadRequestException('This slug is already taken');
        }

        return parent::save($options);
    }
}
