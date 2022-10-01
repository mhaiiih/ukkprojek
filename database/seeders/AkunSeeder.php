<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => '001',
                'name' => 'Ai',
                'email' => 'ai@example.com',
                'level' => 'admin',
                'password' => bcrypt('ai')
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
