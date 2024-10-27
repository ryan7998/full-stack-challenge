<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\AdminMiddleware;
use App\Services\Contracts\PostServiceInterface;
use App\Services\Contracts\CompanyServiceInterface;

class PostController extends Controller
{
    protected $postService;

    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            AdminMiddleware::class
        ];
    }

    public function __construct(PostServiceInterface $postService)
    {
        // $this->middleware('auth');
        $this->postService = $postService;
    }

    /**
     * Display a listing of the posts.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['search', 'position_type', 'salary_min', 'salary_max', 'company', 'location']);
        $posts = $this->postService->getAllPosts($filters);
        $companies = $this->postService->getAllCompanies();

        return view('frontend.posts.index', compact('posts', 'companies'));
    }

    /**
     * Show the form for creating a new post.
     */
    public function create()
    {
        $companies = $this->postService->getAllCompanies();
        return view('admin.posts.create', compact('companies'));
    }

    /**
     * Store a newly created post in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'position_type' => 'required|in:remote,in-person',
            'salary' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
        ]);

        $this->postService->createPost($validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified post.
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post.
     */
    public function edit(Post $post)
    {
        $companies = $this->postService->getAllCompanies();
        return view('admin.posts.edit', compact('post', 'companies'));
    }

    /**
     * Update the specified post in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'company_id' => 'required|exists:companies,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'position_type' => 'required|in:remote,in-person',
            'salary' => 'required|integer|min:0',
            'location' => 'required|string|max:255',
        ]);

        $this->postService->updatePost($post->id, $validated);

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified post from storage.
     */
    public function destroy(Post $post)
    {
        $this->postService->deletePost($post->id);
        return redirect()->route('admin.posts.index')->with('success', 'Post deleted successfully.');
    }
}
