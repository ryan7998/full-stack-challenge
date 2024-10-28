<?php

namespace App\Services\Contracts;

use App\Models\Company;
use Illuminate\Support\Collection;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface CompanyServiceInterface
{
    public function getAllCompanies(array $filters): LengthAwarePaginator;

    public function getCompanyById(int $id): Company;

    public function createCompany(array $data): Company;

    public function updateCompany(int $id, array $data): Company;

    public function deleteCompany(int $id): bool;
}
