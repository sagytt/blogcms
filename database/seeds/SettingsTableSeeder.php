<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        App\Setting::create([
            'site_name' => 'Laravel Blog',
            'contact_email' => 'Laravel@gmail.com',
            'contact_number' => '+97254156416',
            'address' => 'Israel, Ashdod',

        ]);
    }
}
