<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'customer_name', 'people_count', 'date', 'total_price', 'table_number', 'user_id', 'checkin', 'checkout'

        $menu = new \App\Order([
            'customer_name' => 'Ridwan',
            'people_count' => '6',
            'date' => '2017-05-03',
            'total_price' => '55000',
            'table_number' => '2',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();

        $menu = new \App\Order([
            'customer_name' => 'Inez',
            'people_count' => '3',
            'date' => '2017-05-04',
            'total_price' => '15000',
            'table_number' => '1',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();

        $menu = new \App\Order([
            'customer_name' => 'Ella',
            'people_count' => '5',
            'date' => '2017-05-05',
            'total_price' => '12000',
            'table_number' => '3',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();

        $menu = new \App\Order([
            'customer_name' => 'Cheren',
            'people_count' => '4',
            'date' => '2017-05-06 19:34:12',
            'total_price' => '17000',
            'table_number' => '2',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();

        $menu = new \App\Order([
            'customer_name' => 'Faa',
            'people_count' => '3',
            'date' => '2017-05-07 19:34:12',
            'total_price' => '22000',
            'table_number' => '2',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();

        $menu = new \App\Order([
            'customer_name' => 'Rian',
            'people_count' => '2',
            'date' => '2017-05-08 19:34:12',
            'total_price' => '27000',
            'table_number' => '4',
            'user_id' => '1',
            'checkin' => '8:49',
            'checkout' => '9:49',
        ]);
        $menu->save();
        //
    }
}
