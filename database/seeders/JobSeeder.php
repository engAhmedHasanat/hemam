<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\Company;

class JobSeeder extends Seeder
{
    public function run(): void
    {
        $company = Company::create([
            'name' => 'Hemam Tech',
            'country' => 'Palestine',
            'employees_number' => 20,
        ]);

        Job::create([
            'title' => 'UX/UI Designer',
            'description' => 'Creative designer needed for mobile and web apps.',
            'company_id' => $company->id,
            'location' => 'Gaza, Palestine',
            'salary' => '2000 - 3000 USD',
            'work_field' => 'Design',
            'experience_years' => 2,
            'nationality' => 'Any',
            'gender_preference' => 'All',
        ]);

        Job::create([
            'title' => 'DevOps Engineer',
            'description' => 'Manage CI/CD pipelines and server infrastructure.',
            'company_id' => $company->id,
            'location' => 'Remote',
            'salary' => '3000 - 4000 USD',
            'work_field' => 'Engineering',
            'experience_years' => 3,
            'nationality' => 'Any',
            'gender_preference' => 'Male',
        ]);
    }
}
