<?php

use Illuminate\Database\Seeder;
use App\Models\Catfeed;

class CatfeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Catfeed::create([
            'info_kuliah' => 'info-kuliah'
        ]);

        Catfeed::create([
            'info_pekerjaan' => 'info-pekerjaan'
        ]);

        Catfeed::create([
            'info_iklan' => 'info-iklan'
        ]);

        Catfeed::create([
            'hiburan' => 'hiburan'
        ]);
    }
}
