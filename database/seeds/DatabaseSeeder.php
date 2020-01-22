<?php

use App\Handling_floor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

    	$this->truncateTable([
    		'rols',
        'users',
        'sectors',
        'zones',
        'sectors_zones',
        'floors',
        'handling_floors'
        ]);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SectorSeeder::class);
        $this->call(ZoneSeeder::class);
        $this->call(Sectors_zonesSeeder::class);
        $this->call(FloorSeeder::class);
        $this->call(Handling_floorsSeeder::class);
    }
    public function truncateTable(array $tables){
      DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
      foreach($tables as $table){
          DB::table($table)->truncate();
      }
      DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
