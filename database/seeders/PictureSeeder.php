<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\picture;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        picture::factory()
                    ->times(5)
                    ->create();
    }
}
