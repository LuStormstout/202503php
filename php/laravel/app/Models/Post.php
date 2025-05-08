<?php

namespace App\Models;

use Database\Factories\PostFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * @method static PostFactory factory($count = null, $state = [])
 * @method static Builder<static>|Post newModelQuery()
 * @method static Builder<static>|Post newQuery()
 * @method static Builder<static>|Post query()
 * @mixin Eloquent
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property int $author_id
 * @property string $slug
 * @property string $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property-read Author $author
 * @property-read Metadata|null $metadata
 * @property-read Tag[] $tags
 */
class Post extends Model
{
    /** @use HasFactory<PostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'author_id',
        'slug',
        'status',
    ];

    /**
     * A post belongs to an author.
     *
     * @return BelongsTo
     */
    public function author(): BelongsTo
    {
        // return $this->belongsTo(Author::class, 'author_id', 'id');
        // 这里的 author_id 是 Post 表中的外键, id 是 Author 表中的主键
        // $post = Post::find(1);
        // $post->author; // 这样就能拿到文章 ID 为 1 的作者的对象(作者的所有信息)
        // $post->author->name; // 这样就能拿到文章 ID 为 1 的作者的名字
        return $this->belongsTo(Author::class);
    }

    /**
     * A post has one metadata.
     *
     * @return HasOne
     */
    public function metadata(): HasOne
    {
        // return $this->hasOne(Metadata::class, 'post_id', 'id');
        // 这里的 post_id 是 Metadata 表中的外键, id 是 Post 表中的主键
        // $post = Post::find(1);
        // $post->metadata; // 这样就能拿到文章 ID 为 1 的元数据的对象(元数据的所有信息)
        // $post->metadata->view_count; // 这样就能拿到文章 ID 为 1 的元数据的查看数量
        return $this->hasOne(Metadata::class);
    }

    /**
     * A post belongs to many tags.
     *
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id')->withTimestamps();
        // 'post_tags' 是 pivot 表的名称
        // 'post_id' 是 post_tags 表中关联 Post 的外键
        // 'tag_id' 是 post_tags 表中关联 Tag 的外键
        // withTimestamps() 会自动维护 pivot 表中的 created_at 和 updated_at 字段
    }
}
