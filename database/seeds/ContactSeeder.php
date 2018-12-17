<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Table data
        $description = 'Get in Touch with Tag Advertising';
        $address = 'The last of Algiers Street - next to El Basateen Youth Center - New Maadi';
        $phone = '+201153474174';
        $email = 'example@example.com';

        // Seeding table
        $contact = new Contact;
        $contact->description = $description;
        $contact->address = $address;
        $contact->phone = $phone;
        $contact->email = $email;
        $contact->save();
    }
}
