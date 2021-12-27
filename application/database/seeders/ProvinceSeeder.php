<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;
use DateTime;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path('json/provinces.json'));
        $data = json_decode($json);
        $data = collect($data);

        foreach ($data as $d) {
            DB::table('provinces')->insert([
                'id' => $d->id,
                'name' => $d->name,
                'status' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
