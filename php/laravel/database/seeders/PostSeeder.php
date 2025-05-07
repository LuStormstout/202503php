<?php

namespace Database\Seeders;

use App\Models\Author;
use App\Models\Metadata;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 确保有作者和标签存在
        if (Author::count() == 0) {
            $this->call(AuthorSeeder::class);
        }
        if (Tag::count() == 0) {
            $this->call(TagSeeder::class);
        }

        $authors = Author::all();
        $tags = Tag::all();

        if ($authors->isEmpty()) {
            $this->command->info('No authors found, skipping post creation.');
            return;
        }

        Post::factory()->count(50)->make()->each(function ($post) use ($authors, $tags) {
            // 随机分配一个作者
            $post->author_id = $authors->random()->id;
            $post->save(); // 保存帖子以获取 ID

            // 为帖子创建元数据
            Metadata::factory()->create(['post_id' => $post->id]);

            // 为帖子关联随机数量的标签 (1 到 5 个)
            if ($tags->isNotEmpty()) {
                $post->tags()->attach(
                    $tags->random(rand(1, min(5, $tags->count())))->pluck('id')->toArray()
                );
            }
        });
    }
}
