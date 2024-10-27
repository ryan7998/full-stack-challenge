<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;

interface PostServiceInterface
{
    public function getAllPosts(): Collection;

    public function getPostById(int $id): Post;

    public function createPost(array $data): Post;

    public function updatePost(int $id, array $data): Post;

    public function deletePost(int $id): bool;

    public function filterPosts(array $filters): Collection;
}
