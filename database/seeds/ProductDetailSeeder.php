<?php

use Illuminate\Database\Seeder;

class ProductDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productDetails = array(
            //details for cars
            array(                            //this array is for details about 1 car. Repeat this for every car
                array(                        //repeat this for every detail of a single car
                  'product_type' => 'car',
                  'product_id' => '?',        //id from car table
                  'detail_criteria' => '?',
                  'detail' => '?',
                ),
            ),

            //details for parts
            array(                            //this array is for details about 1 part. Repeat this for every part
                array(                        //repeat this for every detail of a single part
                  'product_type' => 'part',
                  'product_id' => '?',        //id from car table
                  'detail_criteria' => '?',
                  'detail' => '?',
                ),
            ),
        );
    }
}
