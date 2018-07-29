<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carmakerlogo = array(
            'storage/images/logos/car maker/bmw_logo.png',
            'storage/images/logos/car maker/lamborghini_logo.png',
            'storage/images/logos/car maker/audi_logo.png',
            'storage/images/logos/car maker/mercedes_benz_logo.png',
        );

        $carmodels = array(
            'storage/images/categories/car model/BMW X3.jpg',
            'storage/images/categories/car model/BMW X5.png',
            'storage/images/categories/car model/BMW i8.jpg',
            'storage/images/categories/car model/BMW Z4.jpg',
            'storage/images/categories/car model/BMW 7 series.jpg',
            'storage/images/categories/car model/Lamborghini Aventador.jpg',
            'storage/images/categories/car model/Lamborghini Centenario.jpg',
            'storage/images/categories/car model/Lamborghini Veneno.jpg',
            'storage/images/categories/car model/Lamborghini Gallardo.jpg',
            'storage/images/categories/car model/Lamborghini Reventón.jpg',
            'storage/images/categories/car model/Audi RS5.jpg',
            'storage/images/categories/car model/Audi R8 4S.jpg',
            'storage/images/categories/car model/Audi TT RS 8S.jpg',
            'storage/images/categories/car model/Audi S5 B9.jpg',
            'storage/images/categories/car model/Audi RS7 C7.jpg',
            'storage/images/categories/car model/Mercedes-Benz S-Class Cabriolet.jpg',
            'storage/images/categories/car model/Mercedes-Benz SLC.jpg',
            'storage/images/categories/car model/Mercedes-Benz E-Class Cabriolet.jpg',
            'storage/images/categories/car model/The Mercedes-Benz SL.jpg',
            'storage/images/categories/car model/Mercedes-Benz Mercedes-AMG GT C Roadster.png',
        );

        $carimages = array(
            'storage/images/products/car/BMW X3 2018 xDrive30i.jpg',
            'storage/images/products/car/BMW X3 2018 M40i nomenclature.jpg',
            'storage/images/products/car/BMW X3 2016 sDrive28i.jpg',
            'storage/images/products/car/BMW X5 2018.jpg',
            'storage/images/products/car/BMW X5 2017 sDrive35i.jpg',
            'storage/images/products/car/BMW X5 2015 sdrive35i.jpg',
            'storage/images/products/car/BMW i8 2017 base.jpg',
            'storage/images/products/car/BMW i8 2016.jpg',
            'storage/images/products/car/BMW i8 2015.jpg',
            'storage/images/products/car/BMW Z4 2007 3.0i.jpg',
            'storage/images/products/car/BMW Z4 s 2016.jpg',
            'storage/images/products/car/BMW Z4 s 2012.jpg',
            'storage/images/products/car/BMW 2017 740e.jpg',
            'storage/images/products/car/BMW 740i 2015.jpg',
            'storage/images/products/car/BMW 750i 2017.png',
            'storage/images/products/car/Lamborghini Aventador LP740-4S 2017.jpg',
            'storage/images/products/car/Lamborghini Aventador LP700-4 2015.jpg',
            'storage/images/products/car/Lamborghini Aventador LP700-4 2012.jpg',
            'storage/images/products/car/Lamborghini Centenario 2016.jpg',
            'storage/images/products/car/Lamborghini Veneno 2017.jpg',
            'storage/images/products/car/Lamborghini Gallardo 2014.jpg',
            'storage/images/products/car/Lamborghini Gallardo 2012.jpg',
            'storage/images/products/car/Lamborghini Gallardo 2011.jpg',
            'storage/images/products/car/Lamborghini Reventón 2007.jpg',
            'storage/images/products/car/Lamborghini Reventón 2008.jpg',
            'storage/images/products/car/Lamborghini Reventón 2009.jpg',
            'storage/images/products/car/Audi RS 5 2.9T 2018.jpg',
            'storage/images/products/car/Audi RS 5 4.2 2015.jpg',
            'storage/images/products/car/Audi RS 5 4.2 2014.jpg',
            'storage/images/products/car/Audi R8 5.2 2018.jpg',
            'storage/images/products/car/Audi R8 5.2 2017.jpg',
            'storage/images/products/car/Audi R8 4.2 2015.jpg',
            'storage/images/products/car/Audi TT RS 2.5 2018.jpeg',
            'storage/images/products/car/Audi TT RS 2.5 2013.jpg',
            'storage/images/products/car/Audi TT RS Base 2012.jpg',
            'storage/images/products/car/Audi S5 3.0T 2018.png',
            'storage/images/products/car/Audi S5 3.0T 2017.jpg',
            'storage/images/products/car/Audi S5 3.0T 2016.jpg',
            'storage/images/products/car/Audi RS7 2018.jpg',
            'storage/images/products/car/Audi RS7 Prestige 2017.jpg',
            'storage/images/products/car/Audi RS7 Prestige 2015.jpg',
            'storage/images/products/car/Mercedes-Benz S-Class Base 2018.jpg',
            'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2018.jpg',
            'storage/images/products/car/Mercedes-Benz S-Class Cabriolet 2017.jpg',
            'storage/images/products/car/Mercedes-Benz SLC 300 Base 2019.jpg',
            'storage/images/products/car/Mercedes-Benz SLC 300 Base 2018.jpg',
            'storage/images/products/car/Mercedes-Benz SLC 300 Base 2017.jpg',
            'storage/images/products/car/Mercedes-Benz E 400 Cabriolet 2018.jpg',
            'storage/images/products/car/Mercedes-Benz E 400 MATIC Cabriolet 2018.jpg',
            'storage/images/products/car/Mercedes-Benz E-Class Base 2018.jpg',
            'storage/images/products/car/The Mercedes-Benz SL-Class base 2016.jpg',
            'storage/images/products/car/The Mercedes-Benz SL-Class base 2015.jpg',
            'storage/images/products/car/The Mercedes-Benz SL-Class Base 2014.jpg',
            'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT Base 2018.jpg',
            'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2018.jpg',
            'storage/images/products/car/Mercedes-Benz Mercedes-AMG GT C Roadster 2017.jpg',
        );

        $partmanufacturerlogo = array(
            'storage/images/logos/part manufacturer/JP_Group.png',
            'storage/images/logos/part manufacturer/TRW.png',
            'storage/images/logos/part manufacturer/RIDEX.png',
            'storage/images/logos/part manufacturer/ABS.png',
            'storage/images/logos/part manufacturer/TOMEX.png',
            'storage/images/logos/part manufacturer/MAPCO.png',
            'storage/images/logos/part manufacturer/MANN FILTER.png',
            'storage/images/logos/part manufacturer/FILTERS purflux.png',
            'storage/images/logos/part manufacturer/TRUCKTEC.png',
            'storage/images/logos/part manufacturer/BOSCH.png',
            'storage/images/logos/part manufacturer/TOTAL.png',
            'storage/images/logos/part manufacturer/DYNAMAX.png',
            'storage/images/logos/part manufacturer/Castrol.png',
            'storage/images/logos/part manufacturer/Novline.png',
            'storage/images/logos/part manufacturer/KSTOOLS.png',
            'storage/images/logos/part manufacturer/Febi.png',
            'storage/images/logos/part manufacturer/Borsehung.png',
            'storage/images/logos/part manufacturer/UFI.png',
            'storage/images/logos/part manufacturer/VAICO.png',
            'storage/images/logos/part manufacturer/AEZ.jpeg',
            'storage/images/logos/part manufacturer/AXXION.png',
            'storage/images/logos/part manufacturer/BBS.png',
            'storage/images/logos/part manufacturer/Steger.png',
            'storage/images/logos/part manufacturer/Magnetto.png',
            'storage/images/logos/part manufacturer/Wolfrace.png',
            'storage/images/logos/part manufacturer/ATS.png',
            'storage/images/logos/part manufacturer/Lenso.png',
        );

        $partcategories = array(
            'storage/images/categories/part category/Wheels.png',
            'storage/images/categories/part category/Brake System.jpg',
            'storage/images/categories/part category/Filters.jpg',
            'storage/images/categories/part category/Oil and Fluids.jpg',
            'storage/images/categories/part category/Interior and Comfort.jpg',
        );

        $partsubcategories = array(
            'storage/images/categories/part sub category/Alloy Wheel.jpg',
            'storage/images/categories/part sub category/Steel Wheel.jpg',
            'storage/images/categories/part sub category/Aluminium Wheel.jpg',

            'storage/images/categories/part sub category/Brake Discs.jpg',
            'storage/images/categories/part sub category/Brake Pads.png',
            'storage/images/categories/part sub category/Brake Shoes.jpg',

            'storage/images/categories/part sub category/Air Filter.jpg',
            'storage/images/categories/part sub category/Fuel Filter.jpg',
            'storage/images/categories/part sub category/Oil Filter.jpg',

            'storage/images/categories/part sub category/Antifreeze.jpg',
            'storage/images/categories/part sub category/Engine Oil.jpg',
            'storage/images/categories/part sub category/Hydraulic oil.jpg',

            'storage/images/categories/part sub category/Boot Liner.jpg',
            'storage/images/categories/part sub category/Window Regulator.jpg',
            'storage/images/categories/part sub category/Floor Mats.jpg',
        );

        foreach ($carmakerlogo as $logo) {
          DB::table('images')->insert([
              'image_type' => 'car_maker_logo',
              'uri' => $logo,
          ]);
        }

        foreach ($carmodels as $model) {
          DB::table('images')->insert([
              'image_type' => 'car_model',
              'uri' => $model,
          ]);
        }

        foreach ($carimages as $image) {
          DB::table('images')->insert([
              'image_type' => 'car',
              'uri' => $image,
          ]);
        }

        foreach ($partmanufacturerlogo as $logo) {
          DB::table('images')->insert([
              'image_type' => 'part_manufacturer_logo',
              'uri' => $logo,
          ]);
        }

        foreach ($partcategories as $image) {
          DB::table('images')->insert([
              'image_type' => 'part_category',
              'uri' => $image,
          ]);
        }

        foreach ($partsubcategories as $image) {
          DB::table('images')->insert([
              'image_type' => 'part_sub_category',
              'uri' => $image,
          ]);
        }
    }
}
