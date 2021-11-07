<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Base{
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
	class SluggableModel extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Article extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Category
 *
 * @property mixed $title
 * @property mixed|string $slug
 * @property mixed $id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles
 * @property-read int|null $articles_count
 * @property-read string $link
 * @method static \Database\Factories\CategoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Category newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Category query()
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Category whereUpdatedAt($value)
 */
	class Category extends \Eloquent {}
}

namespace App\Models{
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
 */
	class ChinaUniversity extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Page
 *
 * @property int $id
 * @property string $slug
 * @property int|null $parent_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|Page[] $children
 * @property-read int|null $children_count
 * @property-read string $link
 * @property-read Page|null $parent
 * @method static \Database\Factories\PageFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Page newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Page query()
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Page whereUpdatedAt($value)
 */
	class Page extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Slug
 *
 * @property mixed $type
 * @property mixed $object_id
 * @property int $id
 * @property string $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Slug newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug query()
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereObjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Slug whereUpdatedAt($value)
 */
	class Slug extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string|null $ip_address
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $logged_in_at
 * @property \Illuminate\Support\Carbon|null $logged_out_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read string $picture
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIpAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoggedInAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLoggedOutAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

