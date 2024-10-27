<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Company;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure companies exist before seeding posts
        if (Company::count() == 0) {
            $this->call(CompanySeeder::class);
        }

        $companies = Company::all();

        foreach ($companies as $company) {
            Post::factory()->count(10)->create([
                'company_id' => $company->id,
            ]);
        }
    }
}
