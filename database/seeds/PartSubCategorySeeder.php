<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use App\Models\Product\PartCategory;

class PartSubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Sub Categories for Brake System Category
        $brakesystems = array(
            array(
              'name' => 'Brake Discs',
              'details' => 'A disc brake is a type of brake that uses calipers to squeeze pairs of pads against a disc or "rotor" to create friction.This action retards the rotation of a shaft, such as a vehicle axle, either to reduce its rotational speed or to hold it stationary. The energy of motion is converted into waste heat which must be dispersed.',
              'category_id' => 1,
            ),
            array(
              'name' => 'Brake Pads',
              'details' => 'Brake pads are a component of disc brakes used in automotive and other applications. Brake pads are steel backing plates with friction material bound to the surface that faces the disc brake rotor.',
              'category_id' => 1,
            ),
            array(
              'name' => 'Brake Shoes',
              'details' => 'A brake shoe is the part of a braking system which carries the brake lining in the drum brakes used on automobiles.',
              'category_id' => 1,
            ),
        );

        //Sub Categories for Filters Category
        $filters = array(
            array(
              'name' => 'Air Filter',
              'details' => 'An oil filter is a filter designed to remove contaminants from engine oil, transmission oil, lubricating oil, or hydraulic oil. Oil filters are used in many different types of hydraulic machinery. A chief use of the oil filter is in internal-combustion engines in on- and off-road motor vehicles, light aircraft, and various naval vessels.',
              'category_id' => 2,
            ),
            array(
              'name' => 'Fuel Filter',
              'details' => 'A particulate air filter is a device composed of fibrous or porous materials which removes solid particulates such as dust, pollen, mold, and bacteria from the air. Filters containing an absorbent or catalyst such as charcoal (carbon) may also remove odors and gaseous pollutants such as volatile organic compounds or ozone.',
              'category_id' => 2,
            ),
            array(
              'name' => 'Oil Filter',
              'details' => 'A fuel filter is a filter in the fuel line that screens out dirt and rust particles from the fuel, normally made into cartridges containing a filter paper. They are found in most internal combustion engines.',
              'category_id' => 2,
            ),
        );

        $categories = array($brakesystems,$filters);
        foreach ($categories as $subcategories) {
          foreach ($subcategories as $subcategory) {
              DB::table('part_sub_categories')->insert([
                  'name' => $subcategory['name'],
                  'details' => $subcategory['details'],
                  'category_id' => $subcategory['category_id'],
              ]);
          }
        }
    }
}
