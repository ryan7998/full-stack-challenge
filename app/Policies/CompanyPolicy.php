<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CompanyPolicy
{
    /**
     * Determine whether the user can view any companies.
     */
    public function viewAny(User $user): bool
    {
        // All authenticated users can view companies
        return $user !== null;
    }

    /**
     * Determine whether the user can view the company.
     */
    public function view(User $user, Company $company): bool
    {
        return $user !== null;
    }

    /**
     * Determine whether the user can create companies.
     */
    public function create(User $user): bool
    {
        // Only admins can create companies
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can update the company.
     */
    public function update(User $user, Company $company): bool
    {
        // Only admins can update companies
        return $user->isAdmin();
    }

    /**
     * Determine whether the user can delete the company.
     */
    public function delete(User $user, Company $company): bool
    {
        // Only admins can delete companies
        return $user->isAdmin();
    }
}
