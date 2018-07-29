<?php

use Illuminate\Database\Seeder;

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
