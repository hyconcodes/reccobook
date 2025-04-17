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
            'Data Science',
            'Machine Learning',
            'Artificial Intelligence',
            'Cybersecurity',
            'Cloud computing',
            'Algorithms and Data structures',
            'Software Engineering',
            'Web Development',
            'Operating System',
            'Computer Networks',
            'Database Management',
            'Python',
            'JavaScript',
            'HTML',
            'CSS',
            'Java',
            'PHP',
            'Ruby',
            'SQL',
            'R',
            'COBOL',
            'TypeScript',
            'UnrealScript',
            'C++',
            'C',
            'C#',
            'JScript.NET',
            'JScript',
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
