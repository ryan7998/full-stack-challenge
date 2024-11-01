<?php

namespace App\Repositories\Contracts;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CompanyRepositoryInterface
{
    public function getAll(array $filters): LengthAwarePaginator;

    public function findById(int $id): Company;

    public function create(array $data): Company;

    public function update(Company $company, array $data): Company;

    public function delete(Company $company): bool;
}
