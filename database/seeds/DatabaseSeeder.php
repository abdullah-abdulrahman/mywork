<?php

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
        $this->call(SliderSeeder::class);
        $this->call(AboutSeeder::class);
        $this->call(TeamSeeder::class);        
        $this->call(PartnerSeeder::class);        
        $this->call(ContactSeeder::class);        
        $this->call(SettingSeeder::class);        
        $this->call(ServiceSeeder::class);        
        $this->call(ProjectSeeder::class);        
        $this->call(ImageSeeder::class);        
        $this->call(FactSeeder::class);        
    }
}
