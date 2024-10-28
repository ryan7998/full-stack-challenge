<?php

namespace App\Repositories\Eloquent;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class EloquentCompanyRepository implements CompanyRepositoryInterface
{
    public function getAll(array $filters): LengthAwarePaginator
    {
        // Apply filters if any
        if (isset($filters['search']) && !empty($filters['search'])) {
            $search = $filters['search'];
            Company::where('name', 'LIKE', '%' . $search . '%')->with('posts');
        }

        // Add more filters as needed...

        return Company::withCount('posts')->paginate(9)->withQueryString();
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
