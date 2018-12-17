<?php

use Illuminate\Database\Seeder;
use App\Partner;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table data
        $names = ['Icon', 'Belly Beez', 'Hadramout', 'Prego', 'Ahua',
                'Booza', 'Hachiko', 'Khalis', 'juice meup', 'kipling'];
        
        // Seeding table
        for($i=0; $i<count($names); $i++){
            $partner = new Partner;
            $partner->name = $names[$i];
            $partner->image = "/main_assets/img/clients/". ($i+1). ".jpg";
            $partner->save();
        }
    }
}
