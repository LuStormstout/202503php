<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Str;

class PostObserver
{
    /**
     * Handle the Post "creating" event.
     *
     * @param Post $post
     */
    public function creating(Post $post): void
    {
        // 自动生成 slug
        if (!$post->slug) {
            $slug = Str::slug($post->title);

            $original = $slug;
            $i = 1;
            while (Post::where('slug', $slug)->exists()) {
                $slug = $original . "-" . $i++;
            }

            $post->slug = $slug;
        }
    }

    /**
     * Handle the Post "created" event.
     */
    public function created(Post $post): void
    {
        // 同时给新发布的文章在对应的 metadata 表中插入一条数据
        if (!$post->metadata) {
            $post->metadata()->create(['post_id' => $post->id]);
        }
    }

    /**
     * Handle the Post "saving" event.
     */
    public function updating(Post $post): void
    {
        $oldSlug = $post->getOriginal('slug');
        $newSlug = Str::slug($post->title);
        if ($oldSlug !== $newSlug) {
            $post->slug = $newSlug;
        }
    }

    /**
     * Handle the Post "updated" event.
     */
    public function updated(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "deleted" event.
     */
    public function deleted(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "restored" event.
     */
    public function restored(Post $post): void
    {
        //
    }

    /**
     * Handle the Post "force deleted" event.
     */
    public function forceDeleted(Post $post): void
    {
        //
    }
}
