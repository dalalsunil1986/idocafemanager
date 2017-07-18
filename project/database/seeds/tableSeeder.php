<?php

use Illuminate\Database\Seeder;

class tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table = new \App\table([
            'name' => 'Meja No. 1',
            'status' => 'free'
        ]);
        $table->save();

        $table = new \App\table([
            'name' => 'Meja No. 2',
            'status' => 'free'
        ]);
        $table->save();

        $table = new \App\table([
            'name' => 'Meja No. 3',
            'status' => 'free'
        ]);
        $table->save();

        $table = new \App\table([
            'name' => 'Meja No. 4',
            'status' => 'free'
        ]);
        $table->save();

        $table = new \App\table([
            'name' => 'Meja No. 5',
            'status' => 'free'
        ]);
        $table->save();

        $table = new \App\table([
            'name' => 'Meja No. 6',
            'status' => 'free'
        ]);
        $table->save();
    }
}
