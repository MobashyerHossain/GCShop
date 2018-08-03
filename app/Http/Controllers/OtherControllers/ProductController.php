<?php

namespace App\Http\Controllers\OtherControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\Car;
use App\Models\Product\CarMaker;
use App\Models\Product\CarModel;
use App\Models\Product\Part;
use App\Models\Product\PartCategory;
use App\Models\Product\PartSubCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Purchase\ResentView;

class ProductController extends Controller
{
    public function findCar($carId){
        $car = Car::find($carId);
        if ($car) {
            if (Auth::check()) {
                $view = new ResentView();
                $view->product_type = 'car';
                $view->product_group_id = $car->getModel()->id;
                $view->consumer_id = Auth::id();
                $view->save();
            }
            return redirect()->route('show.car.details', ['carMakerName' => $car->getModel()->getMaker()->name, 'carModelName' => $car->getModel()->name, 'carName' => $car->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function findPart($partId){
        $part = Part::find($partId);
        if ($part) {
            if (Auth::check()) {
                $view = new ResentView();
                $view->product_type = 'part';
                $view->product_group_id = $part->getSubCategory()->id;
                $view->consumer_id = Auth::id();
                $view->save();
            }
            return redirect()->route('show.part.details', ['partCategoryName' => $part->getSubCategory()->getCategory()->name, 'partSubCategoryName' => $part->getSubCategory()->name, 'partManufacturerName' => $part->getManufacturer()->name, 'partName' => $part->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showCar($carMakerName, $carModelName, $carName){
        $car = Car::where('name', $carName)->first();
        if($car){
          return view('multiAuth.consumer.pages.carDetail', ['car' => $car]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showPart($partCategoryName, $partSubCategoryName, $partManufacturerName, $partName){
        $part = Part::where('name', $partName)->first();
        if($part){
          return view('multiAuth.consumer.pages.partDetail', ['part' => $part]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    //cars by model
    public function findModel($modelId){
        $carModel = CarModel::find($modelId);
        if ($carModel) {
            if (Auth::check()) {
                $view = new ResentView();
                $view->product_type = 'car';
                $view->product_group_id = $carModel->id;
                $view->consumer_id = Auth::id();
                $view->save();
            }
            return redirect()->route('show.car.model', ['carMakerName' => $carModel->getMaker()->name, 'modelName' => $carModel->name]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    public function showModel($carMakerName, $modelName){
        $carModel = CarModel::where('name', $modelName)->first();
        if($carModel){
          return view('multiAuth.consumer.pages.carsByModel', ['cars' => $carModel->getCars()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //parts by sub categroy
    public function findSubCategory($subCategoryId){
        $partsubCategory = PartSubCategory::find($subCategoryId);
        if ($partsubCategory) {
            if (Auth::check()) {
                $view = new ResentView();
                $view->product_type = 'part';
                $view->product_group_id = $partsubCategory->id;
                $view->consumer_id = Auth::id();
                $view->save();
            }
            return redirect()->route('show.part.subCategory', ['partCategoryName' => $partsubCategory->getCategory()->name, 'subCategoryName' => $partsubCategory->name]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    public function showSubCategory($partCategoryName, $subCategoryName){
        $partsubCategory = PartSubCategory::where('name', $subCategoryName)->first();
        if($partsubCategory){
          return view('multiAuth.consumer.pages.partsBySubCategory', ['parts' => $partsubCategory->getParts()]);
        }
        else{
          return view('error.subNotFound', ['x' => 'subcat']);
        }
    }

    //parts by manufacturer
    public function findByManufacturer($partManufacturerId){
        $partManufacturer = PartManufacturer::find($partManufacturerId);
        if ($partManufacturer) {
            return redirect()->route('show.part.manufacturer', ['partManufacturerName' => $partManufacturer->name]);
        }
        else{
            return view('error.subNotFound', ['x' => 'man']);
        }
    }

    public function showByManufacturer($partManufacturerName){
        $partManufacturer = PartManufacturer::where('name', $partManufacturerName)->first();
        if($partManufacturer){
          return view('multiAuth.consumer.pages.partsByManufacturer', ['parts' => $partManufacturer->getParts()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //parts by category
    public function findByCategory($partCategoryId){
        $partCategory = PartCategory::find($partCategoryId);
        if ($partCategory) {
            return redirect()->route('show.part.category', ['partCategoryName' => $partCategory->name]);
        }
        else{
            return view('error.subNotFound', ['x' => 'cat']);
        }
    }

    public function showByCategory($partCategoryName){
        $partCategory = PartCategory::where('name', $partCategoryName)->first();
        if($partCategory){
          return view('multiAuth.consumer.pages.partsByCategory', ['partSubCategories' => $partCategory->getSubCategories()]);
        }
        else{
          return view('error.subNotFound');
        }
    }

    //cars by maker
    public function findMaker($carMakerId){
        $carMaker = CarMaker::find($carMakerId);
        if ($carMaker) {
            return redirect()->route('show.car.maker', ['carMakerName' => $carMaker->name]);
        }
        else{
            return view('error.subNotFound');
        }
    }

    public function showMaker($carMakerName){
        $carMaker = CarMaker::where('name', $carMakerName)->first();
        if($carMaker){
          return view('multiAuth.consumer.pages.carsByMaker', ['carModels' => $carMaker->getModels()]);
        }
        else{
          return view('error.subNotFound', ['x' => 'mak']);
        }
    }
}
