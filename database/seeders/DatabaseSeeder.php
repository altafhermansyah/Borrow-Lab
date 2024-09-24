<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'qwer',
                'nisn' => 'qwer',
                'password' => bcrypt('asd'),
                'role' => 'staff'
            ],
            [
                'name' => 'Altanix',
                'nisn' => '1234',
                'password' => bcrypt('asd'),
                'role' => 'staff'
            ],
            [
                'name' => 'Otto Hasibuan',
                'nisn' => 'otto',
                'password' => bcrypt('asd'),
                'role' => 'staff'
            ],
            [
                'name' => 'Hotman Paris',
                'nisn' => 'hotman',
                'password' => bcrypt('asd'),
                'role' => 'student'
            ],
            [
                'name' => 'Tio Aladah',
                'nisn' => 'tio',
                'password' => bcrypt('asd'),
                'role' => 'student'
            ],
            [
                'name' => 'Toni Adalah',
                'nisn' => 'toni',
                'password' => bcrypt('asd'),
                'role' => 'student'
            ],
            [
                'name' => 'Tino Ladalah',
                'nisn' => 'tino',
                'password' => bcrypt('asd'),
                'role' => 'student'
            ],
        ];

        foreach($data as $key => $d)
        {
            User::create($d);
        }
    }
}
