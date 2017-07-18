<?php

use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menu = new \App\Menu([
            'name' => 'Ayam Goreng + Nasi',
            'price' => '8500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Ayam Bakar + Nasi',
            'price' => '9000',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Ayam Geprek + Nasi',
            'price' => '8500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Telur',
            'price' => '2500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Tempe (3 Potong)',
            'price' => '2500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Tahu (3 Potong)',
            'price' => '2000',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Nasi Goreng',
            'price' => '9500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Indomie Goreng',
            'price' => '3500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Indomie Goreng + Telur',
            'price' => '5500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Indomie Rebus',
            'price' => '3500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Indomie Rebus + Telur',
            'price' => '5500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Nasi Putih',
            'price' => '2500',
            'category' => 'foods'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Teh Teko',
            'price' => '5000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Es Teh',
            'price' => '2000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Teh Hangat',
            'price' => '2000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Es Jeruk',
            'price' => '2500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Jeruk Hangat',
            'price' => '2500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Good Day',
            'price' => '2500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Lemon Tea',
            'price' => '4000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Milk Shake Chocolate',
            'price' => '7500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Milk Shake StrawBerry',
            'price' => '7500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'White Cofee',
            'price' => '2000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Pop Ice',
            'price' => '3000',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Nutrisari',
            'price' => '2500',
            'category' => 'drinks'
        ]);
        $menu->save();

        $menu = new \App\Menu([
            'name' => 'Air Es',
            'price' => '500',
            'category' => 'drinks'
        ]);
        $menu->save();
    }
}
