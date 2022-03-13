<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\Rubric
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric query()
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $slug
 * @method static \Illuminate\Database\Eloquent\Builder|Rubric whereSlug($value)
 */
class Rubric extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
    ];
}
