<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        App\User::create([
           'name' => 'sagy cohen',
           'email' => 'sagix7004@gmail.com',
            'password' => bcrypt('159789'),
        ]);
    }
}
