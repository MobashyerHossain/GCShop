<?php

use Illuminate\Database\Seeder;

class ShowRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('show_rooms')->insert([
            'name' => 'Grim Reaper Cars',
        ]);
    }
}
