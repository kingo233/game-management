<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\UserCharge;

class UserChargeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        UserCharge::factory()->count(100)->create();
    }
}
