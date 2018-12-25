<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Admin;
        $admin->name = "kareem";
        $admin->email = "info@tagadv-eg.com";
        $admin->password = bcrypt('123456789');
        $admin->save();
    }
}
