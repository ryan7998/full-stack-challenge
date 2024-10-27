<?php

namespace App\Services\Contracts;

use App\Models\Post;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface PostServiceInterface
{
    public function getAllPosts(array $filters): LengthAwarePaginator;


    public function getPostById(int $id): Post;

    public function createPost(array $data): Post;

    public function updatePost(int $id, array $data): Post;

    public function deletePost(int $id): bool;

    public function filterPosts(array $filters): Collection;

    public function getAllCompanies(): Collection;

    public function getSimilarPosts(string $title, int $excludeId): \Illuminate\Support\Collection;

    public function getPostsByIds(array $ids): \Illuminate\Support\Collection;
}
