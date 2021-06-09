<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Weapon;
class WeaponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Weapon::factory()->count(30)->create();
        
    }
}
