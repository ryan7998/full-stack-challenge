<?php

namespace App\Repositories\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostRepositoryInterface
{
    public function getAll(): Collection;

    public function findById(int $id): Post;

    public function create(array $data): Post;

    public function update(Post $post, array $data): Post;

    public function delete(Post $post): bool;

    public function filter(array $filters): Collection;
}
