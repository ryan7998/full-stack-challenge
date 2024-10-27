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

        return view('posts.index', compact('posts', 'companies'));
    }

    public function show(Post $post)
    {
        // return view('posts.show', compact('post'));

        // Fetch the job post by ID
        // $post = $this->postService->getPostById($id);

        // Fetch similar jobs based on job title
        $similarJobs = $this->postService->getSimilarPosts($post->title, $post->id);

        return view('posts.show', compact('post', 'similarJobs'));
    }

    /**
     * Display the bookmarks page.
     *
     * @return \Illuminate\View\View
     */
    public function bookmarks()
    {
        return view('posts.bookmarks');
    }

    /**
     * API endpoint to fetch bookmarked jobs.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBookmarkedPosts(Request $request)
    {

        // Validate that 'ids' is an array of integers
        $validator = Validator::make($request->all(), [
            'ids' => 'required|array',
            'ids.*' => 'integer|exists:posts,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Invalid job IDs provided.',
                'messages' => $validator->errors(),
            ], 400);
        }

        $ids = $request->input('ids');

        // Fetch posts by IDs using the repository
        $posts = $this->postService->getPostsByIds($ids);

        return response()->json($posts);
    }
}
