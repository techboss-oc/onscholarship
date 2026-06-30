<?php

namespace Database\Seeders;

use App\Models\University;
use App\Models\Program;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UniversitySeeder extends Seeder
{
    public function run(): void
    {
        // Peking University
        $pku = University::create([
            'name' => 'Peking University',
            'slug' => Str::slug('Peking University'),
            'city' => 'Beijing',
            'province' => 'Beijing',
            'description' => 'Peking University is a major research university in Beijing, China, and a member of the elite C9 League of Chinese universities.',
            'established_year' => '1898',
            'type' => 'Public',
            'ranking' => 'Top 20 Worldwide',
            'is_featured' => true,
            'accepts_scholarship' => true,
        ]);

        Program::create([
            'university_id' => $pku->id,
            'name' => 'Computer Science and Technology',
            'slug' => Str::slug('Computer Science and Technology PKU'),
            'degree_level' => 'bachelor',
            'field_of_study' => 'Computer Science',
            'description' => 'Comprehensive bachelor degree in Computer Science.',
            'duration_years' => 4,
            'tuition_fee_usd' => 4500,
            'language' => 'English',
            'is_active' => true,
            'is_featured' => true,
        ]);

        Scholarship::create([
            'name' => 'Chinese Government Scholarship (CSC)',
            'slug' => Str::slug('Chinese Government Scholarship CSC PKU'),
            'university_id' => $pku->id,
            'type' => 'csc',
            'description' => 'Full scholarship covering tuition, accommodation, and living allowance.',
            'eligibility' => 'International students with excellent academic records.',
            'coverage' => 'full',
            'amount_usd' => 10000,
            'duration' => '4 years',
            'is_active' => true,
            'is_featured' => true,
        ]);

        // Tsinghua University
        $tsinghua = University::create([
            'name' => 'Tsinghua University',
            'slug' => Str::slug('Tsinghua University'),
            'city' => 'Beijing',
            'province' => 'Beijing',
            'description' => 'Tsinghua University is a major research institution in Beijing, China, and the national university of the People\'s Republic of China.',
            'established_year' => '1911',
            'type' => 'Public',
            'is_featured' => true,
            'accepts_scholarship' => true,
        ]);

        Program::create([
            'university_id' => $tsinghua->id,
            'name' => 'Mechanical Engineering',
            'slug' => Str::slug('Mechanical Engineering Tsinghua'),
            'degree_level' => 'master',
            'field_of_study' => 'Engineering',
            'description' => 'Advanced master degree in Mechanical Engineering.',
            'duration_years' => 2,
            'tuition_fee_usd' => 5500,
            'language' => 'English',
            'is_active' => true,
        ]);
        
        // Hainan University
        $hainan = University::create([
            'name' => 'Hainan University',
            'slug' => Str::slug('Hainan University'),
            'city' => 'Haikou',
            'province' => 'Hainan',
            'description' => 'Hainan University is a comprehensive provincial university in Haikou, Hainan, China.',
            'established_year' => '1958',
            'type' => 'Public',
            'is_featured' => true,
            'accepts_scholarship' => true,
        ]);
        
        Program::create([
            'university_id' => $hainan->id,
            'name' => 'International Business Management',
            'slug' => Str::slug('International Business Management Hainan'),
            'degree_level' => 'bachelor',
            'field_of_study' => 'Business',
            'description' => 'Learn global business practices in the tropical island of Hainan.',
            'duration_years' => 4,
            'tuition_fee_usd' => 3000,
            'language' => 'English',
            'is_active' => true,
            'is_featured' => true,
        ]);
    }
}
