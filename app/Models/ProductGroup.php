<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * App\Models\ProductGroup
 *
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $title
 * @property string|null $slug
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductGroup whereUpdatedAt($value)
 */
class ProductGroup extends Model
{
    use HasFactory;

    protected $table = 'product_groups';

    protected $fillable = [
        'title',
    ];
}
