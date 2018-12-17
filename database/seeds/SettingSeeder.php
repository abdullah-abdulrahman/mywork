<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table data
        $email = 'example@example.com';
        $site_name = 'Tag Adv';
        $keywords = 'Advertising, Banners, Booth';
        $description = 'Advertising Company';
        $newsletter = 'Tamen quem nulla quae legam multos aute sint
           culpa legam noster magna veniam enim veniam illum
           dolore legam minim quorum culpa amet magna export
           quem marada parida nodela caramase seza.';
        $facebook = 'https://facebook.com';
        $linkedin = 'https://linkedin.com';
        $instagram = 'https://instagram.com';

        // Seeding Table
        $setting = new Setting;
        $setting->email = $email;
        $setting->site_name = $site_name;
        $setting->keywords = $keywords;
        $setting->description = $description;
        $setting->newsletter = $newsletter;
        $setting->facebook = $facebook;
        $setting->linkedin = $linkedin;
        $setting->instagram = $instagram;

        $setting->save();
    }
}
