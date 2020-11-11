<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; // add DB
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // ... add default category: RMG, Textile, IT, E-commerce
      DB::table('categories')->insert([
            [
              'name' => 'RMG'
            ],[
              'name' => 'Textile'
            ],[
              'name' => 'IT'
            ],[
              'name' => 'E-commerce'
            ]
        ]);
      // ... end
    }
}
