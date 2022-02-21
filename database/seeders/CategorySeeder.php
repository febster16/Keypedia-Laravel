<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '104-Key Keyboard',
            'image' => 'images/104key.jpg',
        ]);
        Category::create([
            'name' => '100-Key Keyboard',
            'image' => 'images/100key.jpg',
        ]);
        Category::create([
            'name' => '87-Key Keyboard',
            'image' => 'images/87key.jpg',
        ]);
        Category::create([
            'name' => '84-Key Keyboard',
            'image' => 'images/84key.jpg',
        ]);
        Category::create([
            'name' => 'SA Profile Keycaps',
            'image' => 'images/saProfile.jpg',
        ]);
        Category::create([
            'name' => 'Cherry Profile Keycaps',
            'image' => 'images/cherryProfile.jpg',
        ]);
    }
}
