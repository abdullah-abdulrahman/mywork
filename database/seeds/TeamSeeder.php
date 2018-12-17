<?php

use Illuminate\Database\Seeder;
use App\Team;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table data
        $title = 'Our Team';

        $description = 'The team at tag advertising is as passionate about
        their own interests as they are about the success
        of the company Our print and installation vendors
        specialize in servicing the production needs of the
        out-of-home industry. All of our partners bring a
        thorough understanding of outdoor applications.
        This expert knowledge ensures that campaigns
        are printed and posted to the highest industry
        standards.';

        // Seeding table
        $team = new Team;
        $team->title = $title;
        $team->description = $description;
        $team->save();
    }
}
