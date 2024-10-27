<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contracts\PostServiceInterface;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService  = $postService;
    }

    public function index(Request $request)
    {
        $filters = $request->only(['search', 'position_type', 'salary_min', 'salary_max', 'company', 'location']);
        $posts = $this->postService->getAllPosts($filters);
        $companies = $this->postService->getAllCompanies();

        return view('frontend.posts.index', compact('posts', 'companies'));
    }

    public function show(Post $post)
    {
        // return view('posts.show', compact('post'));

        // Fetch the job post by ID
        // $post = $this->postService->getPostById($id);

        // Fetch similar jobs based on job title
        $similarJobs = $this->postService->getSimilarPosts($post->title, $post->id);

        return view('frontend.posts.show', compact('post', 'similarJobs'));
    }
}
