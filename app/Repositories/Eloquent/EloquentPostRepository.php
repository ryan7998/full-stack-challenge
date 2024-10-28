<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use Illuminate\Support\Collection;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        $query = Post::with('company');

        // Apply filters if any
        if (isset($filters['search'])) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('description', 'like', '%' . $filters['search'] . '%');
        }

        if (isset($filters['position_type'])) {
            $query->where('position_type', $filters['position_type']);
        }

        if (isset($filters['salary_min'])) {
            $query->where('salary', '>=', $filters['salary_min']);
        }
        if (isset($filters['salary_max'])) {
            $query->where('salary', '<=', $filters['salary_max']);
        }

        if (isset($filters['company'])) {
            $query->where('company_id', $filters['company']);
        }

        if (isset($filters['location'])) {
            $query->where('location', 'LIKE', '%' . $filters['location'] . '%');
        }

        return $query->orderBy('created_at', 'desc')->paginate(20)->withQueryString();
    }

    public function findById(int $id): Post
    {
        return Post::with('company')->findOrFail($id);
    }

    public function create(array $data): Post
    {
        return Post::create($data);
    }

    public function update(Post $post, array $data): Post
    {
        $post->update($data);
        return $post;
    }

    public function delete(Post $post): bool
    {
        return $post->delete();
    }

    public function filter(array $filters): Collection
    {
        $query = Post::with('company');

        if (!empty($filters['position_type'])) {
            $query->where('position_type', $filters['position_type']);
        }

        if (!empty($filters['salary'])) {
            $query->where('salary', '>=', $filters['salary']);
        }

        if (!empty($filters['company'])) {
            $query->whereHas('company', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['company'] . '%');
            });
        }

        if (!empty($filters['location'])) {
            $query->where('location', 'like', '%' . $filters['location'] . '%');
        }

        return $query->latest()->get();
    }

    public function getSimilarPosts(string $title, int $excludeId): Collection
    {
        // Extract keywords from the title
        $keywords = explode(' ', strtolower($title));

        return Post::with('company')
            ->where('id', '!=', $excludeId)
            ->where(function ($query) use ($keywords) {
                foreach ($keywords as $word) {
                    $query->orWhere('title', 'like', '%' . $word . '%');
                }
            })
            ->take(3) // Limit to 3 similar jobs
            ->get();
    }

    public function getPostsByIds(array $ids): Collection
    {
        return Post::with('company')->whereIn('id', $ids)->get();
    }
}
