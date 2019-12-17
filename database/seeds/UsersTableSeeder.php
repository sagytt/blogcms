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
       $user = App\User::create([
           'name' => 'sagy cohen',
           'email' => 'sagix7004@gmail.com',
            'password' => bcrypt('159789'),
            'admin' => 1,
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatars/1.jpg',
            'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
