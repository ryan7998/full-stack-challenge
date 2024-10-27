<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\Collection;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(): Collection
    {
        return Company::withCount('posts')->get();
    }

    public function findById(int $id): Company
    {
        return Company::with('posts')->findOrFail($id);
    }

    public function create(array $data): Company
    {
        return Company::create($data);
    }

    public function update(Company $company, array $data): Company
    {
        $company->update($data);
        return $company;
    }

    public function delete(Company $company): bool
    {
        return $company->delete();
    }
}
