<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentPostRepository implements PostRepositoryInterface
{
    public function getAll(): Collection
    {
        return Post::with('company')->latest()->get();
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
}
