<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Galleries;
use App\Models\Organization;
use App\Models\SettingWeb;
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

        SettingWeb::create([
            'logo' => 'company_logo.svg',
            'alt_logo' => 'LPKMIDORI',
            'about' => 'Di LPK kami, kami menawarkan pelatihan bahasa Jepang yang mendalam dan terfokus untuk membantu Anda mencapai tujuan karir Anda.',
            'number_phone' => '6281299459042',
            'company_address' => 'Jl. RonggoWarsito No.6, Puri, Kec. Pati, Kabupaten Pati, Jawa Tengah 59113',
            'google_maps' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1981.0801377457315!2d111.02630303435639!3d-6.750299014854017!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e70d24945b1c719%3A0x41941cd5d44e9d79!2sJl.%20RonggoWarsito%20No.6%2C%20Puri%2C%20Kec.%20Pati%2C%20Kabupaten%20Pati%2C%20Jawa%20Tengah%2059113!5e0!3m2!1sid!2sid!4v1712329574107!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'email' => 'lpkmidorigakko@gmail.com'
        ]);
    }
}
