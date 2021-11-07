<?php

namespace App\Base;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Base\SluggableModel
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel findSimilarSlugs($attribute, $config, $slug)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Base\SluggableModel whereSlug($slug)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SluggableModel query()
 */
class SluggableModel extends Model
{}
