<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Company;
use Illuminate\Support\Collection;
use App\Services\Contracts\PostServiceInterface;
use App\Repositories\Contracts\PostRepositoryInterface;

class PostService implements PostServiceInterface
{
    protected $postRepository;

    public function __construct(PostRepositoryInterface $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function getAllPosts(): Collection
    {
        return $this->postRepository->getAll();
    }

    public function getPostById(int $id): Post
    {
        return $this->postRepository->findById($id);
    }

    public function createPost(array $data): Post
    {
        return $this->postRepository->create($data);
    }

    public function updatePost(int $id, array $data): Post
    {
        $post = $this->postRepository->findById($id);
        return $this->postRepository->update($post, $data);
    }

    public function deletePost(int $id): bool
    {
        $post = $this->postRepository->findById($id);
        return $this->postRepository->delete($post);
    }

    public function filterPosts(array $filters): Collection
    {
        return $this->postRepository->filter($filters);
    }


    public function getAllCompanies(): \Illuminate\Support\Collection
    {
        return Company::all();
    }
}
