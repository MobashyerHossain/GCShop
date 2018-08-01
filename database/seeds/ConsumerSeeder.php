<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConsumerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\MultiAuth\Consumer::class,10)->create();
    }
}
