<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    /**
     * Display a listing of the posts.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // 我们这个只是位了测试日志能正确记录
        // Log::channel('order')->error('订单支付失败', $request->header());

        if ($request->get('search')) {
            $posts = Post::with('author')
                ->where('title', 'like', '%' . $request->get('search') . '%')
                ->orWhere('content', 'like', '%' . $request->get('search') . '%')
                ->paginate($this->perPage);
        } else {
            $posts = Post::with('author')->paginate($this->perPage);
        }

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        return view('posts.create', [
            'authors' => Author::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PostRequest $request
     * @return RedirectResponse
     */
    public function store(PostRequest $request): RedirectResponse
    {
        // 因为我们目前没有做作者登录这个功能, 所以我们这里随机拿一个作者 id 给当前要创建的这个文章
        if (!$request->has('author_id')) {
            $request->merge(['author_id' => Author::pluck('id')->random()]);
        }

        // 创建新的文章
        Post::create($request->only('title', 'content', 'author_id'));

        // 重定向到文章列表页面, 并显示成功消息
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function show(Post $post): View
    {
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Post $post
     * @return View
     */
    public function edit(Post $post): View
    {
        return view('posts.edit', [
            'post' => $post,
            'authors' => Author::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param PostRequest $request
     * @param Post $post
     * @return RedirectResponse
     */
    public function update(PostRequest $request, Post $post): RedirectResponse
    {
        // 更新文章
        $post->update($request->only('title', 'content', 'author_id'));

        // 重定向到文章列表页面, 并显示成功消息
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     * @return RedirectResponse
     */
    public function destroy(Post $post): RedirectResponse
    {
        // 删除文章
        $post->delete();

        // 重定向到文章列表页面, 并显示成功消息
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
