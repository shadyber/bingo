<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
       'name' => 'Super Admin',
        'email' => 'admin@rootsystem.com',
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi' // password
       ]);

        \App\Models\Agent::factory()->create([
            'name' => 'Main Agent',
            'tel' => '994',
            'city' => 'Addis Ababa',
            'user_id' => '1',
            'location'=>'',
            'is_active'=>false
        ]);




    }
}
