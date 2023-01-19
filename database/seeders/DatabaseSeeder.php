<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'roles' => 'Admin',
            'status' => '-',
            'name' => 'Hyorimika',
            'email' => 'hyorimika@gmail.com',
            'address' => 'Japan',
            'phone' => '085774620411',
            'password' => bcrypt('hyori'),
        ]);

        User::create([
            'roles' => 'Admin',
            'status' => '-',
            'name' => 'Arabella',
            'email' => 'arabella@arabella.com',
            'address' => 'Indonesia',
            'phone' => '0895372371035',
            'password' => bcrypt('arabella'),
        ]);
    }
}
