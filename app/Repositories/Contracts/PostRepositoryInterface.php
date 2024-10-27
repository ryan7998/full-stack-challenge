<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostRepositoryInterface
{
    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(int $id): Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): Post;

    public function delete(Post $post): bool;

    public function filter(array $filters): Collection;

    public function getSimilarPosts(string $title, int $excludeId): Collection;

    public function getPostsByIds(array $ids): Collection;
}
