<?php

namespace Database\Seeders;

use App\Models\Catergory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CatergorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cate = [
            'Mathematics',
            'Physics',
            'Chemistry',
            'Biology',
            'Computer Science',
            'Electrical Engineering',
            'Mechanical Engineering',
            'Civil Engineering',
            'Architecture',
            'Business Administration',
            'Economics',
            'Accounting',
            'Marketing',
            'Psychology',
            'Sociology',
            'Political Science',
            'History',
            'Philosophy',
            'English',
            'Linguistics',
            'Education',
            'Law',
            'Medicine',
            'Nursing',
            'Pharmacy',
            'Environmental Science',
            'Geography',
            'Fine Arts',
            'Music',
            'Theatre Arts',
            'Library and Information Science',
            'Statistics',
            'Geology',
            'Microbiology',
            'Biochemistry',
            'Public Administration',
            'Mass Communication',
            'Agricultural Science',
            'Veterinary Medicine',
            'Dentistry',
            'Urban and Regional Planning',
            'Estate Management',
            'Quantity Surveying',
            'Industrial Design',
            'Food Science and Technology',
            'Forestry',
            'Animal Science',
            'Plant Science',
            'Marine Science',
            'Physical Education',
            'Guidance and Counselling',
            'Religious Studies',
            'French',
            'German',
            'Arabic',
            'Computer Engineering',
            'Petroleum Engineering',
            'Chemical Engineering',
            'Materials Science',
            'Actuarial Science',
            'Tourism and Hospitality Management'
        ];
        foreach ($cate as $name) {
            Catergory::create([
                'name' => $name,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
        // Catergory::truncate();
    }
}
