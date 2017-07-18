<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User([
            'username' => 'faatulo',
            'password' => bcrypt('12345'),
            'type' => 'Manager'
        ]);
        $user->save();

        $user = new \App\User([
            'username' => 'ella',
            'password' => bcrypt('12345'),
            'type' => 'Kasir'
        ]);
        $user->save();

        $user = new \App\User([
            'username' => 'ester',
            'password' => bcrypt('12345'),
            'type' => 'Dapur'
        ]);
        $user->save();

    }
}
