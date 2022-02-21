<?php

namespace Database\Seeders;

use App\Models\Keyboard;
use Illuminate\Database\Seeder;

class KeyboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Ducky One 2 Skyline',
            'price' => '89',
            'description' => 'Strong and durable, CHERRY MX Mechanical Switches guarantee at least 50 million keystrokes, making your keyboard a reliable partner for years of intense gaming & typing.',
            'image' => 'images/duckyOne2Skyline.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Ducky One 2 Horizon',
            'price' => '89',
            'description' => 'Strong and durable, CHERRY MX Mechanical Switches guarantee at least 50 million keystrokes, making your keyboard a reliable partner for years of intense gaming & typing.',
            'image' => 'images/duckyOne2Horizon.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Night Typist',
            'price' => '104',
            'description' => 'The MK Night Typist is built for typing professionals who work in both well lit and low light environments. We looked at everything a typing professional cares about in their keyboard and combined it all to create the MK Typist, then we took it one step further and added warm backlighting to create the MK Night Typist. If you are a typing professional, this is the only keyboard you will ever need.',
            'image' => 'images/nightTypist.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Varmilo Sakura Pink',
            'price' => '143',
            'description' => 'Varmilo VA108M Sakura Pink LED Dye Sub PBT Mechanical Keyboard.',
            'image' => 'images/varmilo.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Ducky One 2 Good in Blue',
            'price' => '89',
            'description' => 'Strong and durable, CHERRY MX Mechanical Switches guarantee at least 50 million keystrokes, making your keyboard a reliable partner for years of intense gaming & typing.',
            'image' => 'images/duckyOne2Good.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Vortex Tab 90M',
            'price' => '159',
            'description' => 'Vortex Tab 90M Double Shot PBT Mechanical Keyboard.',
            'image' => 'images/vortexTab90M.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Leopold FC980M',
            'price' => '119',
            'description' => 'Leopold FC980M Two Tone White PD Double Shot PBT Mechanical Keyboard.',
            'image' => 'images/leopoldFC980M.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Leopold FC900R',
            'price' => '119',
            'description' => 'Leopold FC900R Grey/Blue PD Double Shot PBT Mechanical Keyboard.',
            'image' => 'images/leopoldFC900R.jpg',
        ]);
        Keyboard::create([
            'category_id' => '1',
            'name' => 'Realforce R2 PFU',
            'price' => '305',
            'description' => 'Realforce R2 PFU Limited Edition Ivory Dye Sub PBT Mechanical Keyboard',
            'image' => 'images/realforceR2.jpg',
        ]);

        Keyboard::create([
            'category_id' => '2',
            'name' => 'Kira Mechanical Keyboard',
            'price' => '169',
            'description' => 'Angelo Tobias (thesiscamper) and Input Club collaborated to create Kira’s uniquely classy RGB aesthetic. Kira comes with a variety of mechanical switches, which are hot swappable. It can be configured with Input Club’s typist friendly Hako Switches and a variety of options from other manufacturers.',
            'image' => 'images/kira.jpg',
        ]);
        Keyboard::create([
            'category_id' => '3',
            'name' => 'Logitech G915',
            'price' => '169',
            'description' => 'A breakthrough in design and engineering, the G915 features LIGHTSPEED pro-grade wireless, advanced LIGHTSYNC RGB, and new high-performance low-profile mechanical switches. Meticulously crafted from premium materials, the G915 is a sophisticated design of unparalleled beauty, strength, and performance. Meet G915 LIGHTSPEED and play the next dimension.',
            'image' => 'images/logitechG915.jpg',
        ]);
        Keyboard::create([
            'category_id' => '4',
            'name' => 'Ajazz AK33',
            'price' => '49',
            'description' => 'AJAZZ AK33 Linear Action Mechanical Keyboard Gaming E-sport LED Colorful Keyboard 82 Keys USB Wired Anti-Ghosting for PC Notebook Laptop Desktop A-JAZZ blue switch mechanical gaming keyboard with fast response, good tactile feedback and excellent keystroke feeling, brings you perfect using experience when you type or play games. Ergonomic design, full keys anti-ghosting, 82 keys, USB cable and keyboard seperated, all these Features will give you great fun and convenience.',
            'image' => 'images/ajazzAK33.jpg',
        ]);
        Keyboard::create([
            'category_id' => '5',
            'name' => 'Ducky Azure SA Profile',
            'price' => '49',
            'description' => 'Bright, pure, clear. ABS Double-shot seamless. Dual colors design Non-backlit keycaps. Irreplaceable visual enjoyment',
            'image' => 'images/azureKeycaps.jpg',
        ]);
        Keyboard::create([
            'category_id' => '6',
            'name' => 'Corgi Cherry Profile',
            'price' => '33',
            'description' => 'PBT DYE-SUB KEYCAPS. Total Keys: 136keys, Thickness: 1.35 mm, Weight:370g',
            'image' => 'images/corgiKeycaps.jpg',
        ]);
    }
}
