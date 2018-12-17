<?php

use Illuminate\Database\Seeder;
use App\About;

class AboutSeeder extends Seeder
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
            'Our Vision',
            'Our Experiences',
            'Our Goal'
        ];

        $description = [
            'Tag advertising was founded as a fresh and
            innovative outdoor media company focused on
            outdoor advertising.',
            'It’s the perspective we take. With every initiative,
            campaign, launch or proposal, we encourage our
            clients to let their brand up for air, take a deep
            breath and make an impact. We put influence
            at the center of our programming, turning ideas
            upside down to help you remove the shackles of
            convention, define your own set of rules and find
            the compelling center. That’s because the most
            reckless thing a brand can do in today’s dynamic
            communications landscape is play it safe.
            more the compelling center.',
            'Generate revenue for our partners while providing
            great signage opportunities for our advertising
            clients. With the help of our partners and incredible
            staff.'
        ];

        $image = [
            '/main_assets/img/about-plan.jpg',
            '/main_assets/img/about-mission.jpg',
            '/main_assets/img/about-vision.jpg'
        ];

        // Seeding table
        for($i=0; $i<count($title); $i++){
            $about = new About;
            $about->title = $title[$i];
            $about->description = $description[$i];
            $about->image = $image[$i];
            $about->save();
        }
    }
}
