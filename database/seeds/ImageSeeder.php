<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding table
        for($i=1; $i<=30; $i++){
            $image = new Image;
            $image->project_id = $i;
            $image->image = "/main_assets/img/portfolio/". $i. ".jpg";

            $image->save();
        }
    }
}
