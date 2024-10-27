<?php

namespace App\Services\Contracts;

use App\Models\Company;
use Illuminate\Support\Collection;

interface CompanyServiceInterface
{
    public function getAllCompanies(): Collection;

    public function getCompanyById(int $id): Company;

    public function createCompany(array $data): Company;

    public function updateCompany(int $id, array $data): Company;

    public function deleteCompany(int $id): bool;
}
