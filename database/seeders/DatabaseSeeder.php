<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Galleries;
use App\Models\Organization;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Developer Ganteng',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        Galleries::factory(30)->create();

        // Organization::create([
        //     'name' => 'Suwardi',
        //     'position' => 'Presiden',
        //     'parent_id' => 0,
        //     'children_id' => 3
        // ]);

        // Organization::create([
        //     'name' => 'Suwardi',
        //     'position' => 'Presiden',
        //     'parent_id' => 0,
        //     'children_id' => 4
        // ]);

        // Organization::create([
        //     'name' => 'Joko Pujiwidhiono',
        //     'position' => 'Penasihat',
        //     'parent_id' => 1,
        //     'children_id' => 0
        // ]);

        // Organization::create([
        //     'name' => 'Isnaini Oktin Safaah',
        //     'position' => 'Sekretaris',
        //     'parent_id' => 1,
        //     'children_id' => 6
        // ]);

        // Organization::create([
        //     'name' => 'Giarti Susanti',
        //     'position' => 'Sekretaris',
        //     'parent_id' => 3,
        //     'children_id' => 0
        // ]);

        // Organization::create([
        //     'name' => 'Andika Ardhi',
        //     'position' => 'Sekretaris',
        //     'parent_id' => 4,
        //     'children_id' => 0
        // ]);
    }
}
