<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'about_us' => 'a',
            'phone' => '011',
            'email' => 'a@a.com',
            'fb_link' => 'a@a.com',
            'tw_link' => 'a@a.com',
            'inst_link' => 'a@a.com',
            'whatsapp_link' => 'a@a.com',
            'skype_link' => 'a@a.com',
            'linkedin_link' => 'a@a.com',
            'address' => 'a@a.com'
        ]);
    }
}
