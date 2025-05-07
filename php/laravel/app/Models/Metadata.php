<?php

namespace App\Models;

use Database\Factories\MetadataFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 *
 *
 * @method static MetadataFactory factory($count = null, $state = [])
 * @method static Builder<static>|Metadata newModelQuery()
 * @method static Builder<static>|Metadata newQuery()
 * @method static Builder<static>|Metadata query()
 * @mixin Eloquent
 */
class Metadata extends Model
{
    /** @use HasFactory<MetadataFactory> */
    use HasFactory;

    protected $fillable = [
        'like_count',
        'view_count',
        'comment_count',
        'share_count',
        'favorite_count',
        'post_id',
    ];

    /**
     * A metadata belongs to a post.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
