<?php

use Illuminate\Database\Seeder;
use App\Fact;

class FactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seeding table
        $fact = new Fact;
        $fact->num_one = rand(10,30);
        $fact->num_two = rand(10,30);
        $fact->num_three = rand(10,30);
        $fact->num_four = rand(10,30);
        $fact->fact_one = 'Clients';
        $fact->fact_two = 'Projects';
        $fact->fact_three = 'Hours';
        $fact->fact_four = 'Workers';

        $fact->save();
    }
}
