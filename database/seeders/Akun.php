<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class akun extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'qwer',
                'nisn' => 'qwer',
                'password' => bcrypt('asd'),
                'role' => 'staff'
            ]
        ];

        foreach($data as $key => $d)
        {
            User::create($d);
        }
    }
}
