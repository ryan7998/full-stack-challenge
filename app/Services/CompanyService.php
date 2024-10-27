<?php

namespace App\Services;

use App\Models\Company;
use App\Services\Contracts\CompanyServiceInterface;
use App\Repositories\Contracts\CompanyRepositoryInterface;
use Illuminate\Support\Collection;

class CompanyService implements CompanyServiceInterface
{
    protected $companyRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getAllCompanies(): Collection
    {
        return $this->companyRepository->getAll();
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
