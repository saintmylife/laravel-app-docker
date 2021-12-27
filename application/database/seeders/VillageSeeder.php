<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;
use DateTime;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get(database_path('json/villages.json'));
        $data = json_decode($json);
        $data = collect($data);

        foreach ($data as $d) {
            DB::table('villages')->insert([
                'id' => $d->id,
                'name' => $d->name,
                'district_id' => $d->district_id,
                'status' => 1,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime()
            ]);
        }
    }
}
