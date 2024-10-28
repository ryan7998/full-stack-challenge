<?php

namespace App\Services;

use App\Models\Company;
use Illuminate\Support\Collection;
use App\Services\Contracts\CompanyServiceInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use App\Repositories\Contracts\CompanyRepositoryInterface;

class CompanyService implements CompanyServiceInterface
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAllCompanies(array $filters): LengthAwarePaginator
    {
        return $this->companyRepository->getAll($filters);
    }

    public function getCompanyById(int $id): Company
    {
        return $this->companyRepository->findById($id);
    }

    public function createCompany(array $data): Company
    {
        return $this->companyRepository->create($data);
    }

    public function updateCompany(int $id, array $data): Company
    {
        $company = $this->companyRepository->findById($id);
        return $this->companyRepository->update($company, $data);
    }

    public function deleteCompany(int $id): bool
    {
        $company = $this->companyRepository->findById($id);
        return $this->companyRepository->delete($company);
    }
}
