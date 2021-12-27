<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;
use DateTime;

class RegencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $json = File::get(database_path('json/regencies.json'));
        $data = json_decode($json);
        $data = collect($data);

        foreach ($data as $d) {
            DB::table('regencies')->insert([
                'id' => $d->id,
                'name' => $d->name,
                'province_id' => $d->province_id,
                'status' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
