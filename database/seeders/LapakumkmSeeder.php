<?php

namespace Database\Seeders;

use App\Models\Lapakumkm;
use Illuminate\Database\Seeder;

class LapakumkmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lapakumkm::factory()
            ->count(10)
            // ->hasLodgers(1)
            ->create();
    }
}
