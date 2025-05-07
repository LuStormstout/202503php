<?php

namespace App\Models;

use Database\Factories\AuthorFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 *
 *
 * @method static AuthorFactory factory($count = null, $state = [])
 * @method static Builder<static>|Author newModelQuery()
 * @method static Builder<static>|Author newQuery()
 * @method static Builder<static>|Author query()
 * @mixin Eloquent
 */
class Author extends Model
{
    /** @use HasFactory<AuthorFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'bio',
    ];


    /**
     * Define a one-to-many relationship with the Post model.
     *
     * $author = Author::find(1);
     * $author->posts; // 这样就能拿到作者 ID 为 1 的所有文章
     * foreach ($author->posts as $post) {
     *     echo $post->title;
     * }
     * 我们在这里使用获取 $author 下面的 posts 属性的方法来获取当前这个作者的所有文章
     * 实际上是在访问一个 Author 对象的 posts 属性, 其实我们的 Author 对象并没有 posts 属性
     * 这里就是 Laravel 框架实际上使用了 __get() 方法来获取 posts 属性
     * 这里实际上就会去查询 Post 表中 author_id = 1 的所有文章
     * 实际上执行的 SQL 语句是 SELECT * FROM posts WHERE author_id = 1
     *
     * @return HasMany
     */
    public function posts(): HasMany
    {
        // Define the relationship with the Post model
        // return $this->hasMany(Post::class, 'author_id', 'id');
        // 这里的 author_id 是 Post 表中的外键, id 是 Author 表中的主键
        return $this->hasMany(Post::class);
    }
}
