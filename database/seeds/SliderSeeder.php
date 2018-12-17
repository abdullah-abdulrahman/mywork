<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        // Table data
        $title = [
            'Tag Advertising',
            'Introduction'
        ];

        $description = [
            'We can place your
            message in front of millions of
            shoppers at malls and lifestyle centers
            across the country. From local, to regional, to
            national advertisers, we provide access to target
            a captive audience. Below are examples of some of
            the many campaigns we›ve run at our centers across the
            country.', 

            'Our media lets advertisers connect with consumers
            in meaningful ways. It is design, technology and
            communication driven to help brands stand out, build
            relationships, win loyalty and inspire action. we
            maintain highly collaborative relationships with
            our clients in order to build custom outdoor
            campaigns that will meet marketing
            objectives and electrify the
            marketplace.'
        ];

        $image = [
            "/main_assets/img/intro-carousel/1.jpg",
            "/main_assets/img/intro-carousel/2.jpg"
        ];

        // Seeding Table
        for($i=0; $i<count($title); $i++){
            $slider = new Slider;
            $slider->title = $title[$i];
            $slider->description = $description[$i];
            $slider->image = $image[$i];
            $slider->save();
            }
    }
}
