<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'us1',
                'email' => 'us1@us.it',
                'password' => Hash::make('user1')
            ],
            [
                'name' => 'us2',
                'email' => 'us2@us.it',
                'password' => Hash::make('user2')
            ],
            [
                'name' => 'us3',
                'email' => 'us3@us.it',
                'password' => Hash::make('user3')
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }

    }
}
