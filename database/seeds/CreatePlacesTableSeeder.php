<?php

use Illuminate\Database\Seeder;
use App\Models\Places;
class CreatePlacesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('places')->delete();
      $json = File::get('public/test_json/starbucks_new_york.json');
      $data = json_decode($json);
      foreach ($data as $key => $row) {
        Places::create(
          array(
            'id'      => $row->id,
            'name'      => $row->name,
            'street'    => $row->street,
            'city'      => $row->city,
            'latitude'  => $row->latitude,
            'longitude' => $row->longitude,
          ));
      }
    }
}
