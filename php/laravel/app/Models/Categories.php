<?php

namespace App\Models;

use Database\Factories\CategoriesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property string $name 名称
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CategoriesFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Categories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categories extends Model
{
    /** @use HasFactory<CategoriesFactory> */
    use HasFactory;
}
