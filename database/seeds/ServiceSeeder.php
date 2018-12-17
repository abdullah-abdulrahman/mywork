<?php

use Illuminate\Database\Seeder;
use App\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table data
        $nums = ['one', 'two', 'three', 'four', 'five', 'six'];

        // Seeding table
        for($i=0; $i<count($nums); $i++){
            $service = new Service;
            $service->name = "Service ". $nums[$i];
            $service->description = "This is a brief description of Service ". $nums[$i].
            " Lorem ipsum dolor sit amet, consectetur adipiscing elit,
             sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
             Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
             nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
             reprehenderit in voluptate velit esse cillum dolore eu fugiat
             nulla pariatur. Excepteur sint occaecat cupidatat non proident,
             sunt in culpa qui officia deserunt mollit anim id est laborum.";
             
            $service->image = "/main_assets/img/services/". $nums[$i].".jpg";

            $service->save();
        }
    }
}
