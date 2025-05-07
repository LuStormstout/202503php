<?php

namespace App\Models;

use Database\Factories\PostTagFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static PostTagFactory factory($count = null, $state = [])
 * @method static Builder<static>|PostTag newModelQuery()
 * @method static Builder<static>|PostTag newQuery()
 * @method static Builder<static>|PostTag query()
 * @mixin Eloquent
 */
class PostTag extends Model
{
    /** @use HasFactory<PostTagFactory> */
    use HasFactory;
}
