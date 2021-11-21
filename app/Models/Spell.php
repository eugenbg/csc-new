<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Spell
 *
 * @property int $id
 * @property string $title
 * @property string $prompt
 * @property string $tokens
 * @property string $temperature
 * @property string $top_p
 * @property string $frequency_penalty
 * @property string|null $engine
 * @method static \Illuminate\Database\Eloquent\Builder|Spell newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell query()
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereEngine($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Spell whereTitle($value)
 * @mixin \Eloquent
 */
class Spell extends Model
{
    public $timestamps = false;

    public $engines = [
        'ada',
        'babbage',
        'curie',
        'curie-instruct-beta',
        'davinci',
        'davinci-instruct-beta',
    ];

    protected $fillable = [
        'title',
        'prompt',
        'engine',
        'tokens',
        'temperature',
        'top_p',
        'frequency_penalty',
    ];
}
