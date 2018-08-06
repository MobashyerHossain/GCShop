<?php
  $carmakers = App\Models\Product\CarMaker::all();
  $partcategories = App\Models\Product\PartCategory::all();
  $partmanufacturers = App\Models\Product\PartManufacturer::all();
  $recommendeds = (new App\Http\Controllers\Auth\ConsumerControllers\ConsumerController())->getRecommendation();
?>
<!--Search Engine-->
<div class="col-5">
    <div class="input-group border-top-0 border-right-0 border-left-0 border-bottom" style="margin-top:15px;">
      <div class="input-group-prepend">
        <!--Search Button-->
        <button class="btn bg-white rounded-0 no-outline">
          <span class="fa fa-search" style="opacity:.6;"></span>
        </button>
      </div>
      <input id="siteSearchInput" class="form-control no-outline border-0 p-1 pl-3 pr-3" style="font-size:13px;" type="text" placeholder="Search by Car, Maker, Model, Part, Category, Sub Category, or Manufacturer...">
    </div>
    <!--Search Items-->
    <div id="search_box" class="rounded-0 p-0 collapse bg-white border" id="searchBoxcollapse" style="box-shadow:0 2px 10px rgba(0, 0, 0, 0.5);position:absolute; top:75px;left:15px; width:644px;">
        <div id="searchlist" style="width:642px;">
            <ul class="nav nav-pills nav-fill rounded-0 mt-0 border-bottom" style="box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);">
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-1" class="active nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Car</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-2" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Maker</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-3" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Model</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-4" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Part</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-5" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Category</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-6" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Sub Category</a></li>
                <li class="nav-item rounded-0"><a role="tab" data-toggle="pill" href="#searchBoxTab-7" class="nav-link rounded-0 p-1 m-0" style="text-decoration:none;">Manufacturer</a></li>
            </ul>
            <div class="tab-content rounded-0 p-2"  style="overflow-y: scroll; height:450px;">
                <div role="tabpanel" class="tab-pane rounded-0 active" id="searchBoxTab-1">
                  @foreach($carmakers as $carmaker)
                    @foreach($carmaker->getModels() as $carmodel)
                      @foreach($carmodel->getCars() as $car)
                        <a id="slist" class="text-dark" href="{{ route('find.car.details', $car->id)}}" style="text-decoration:none;">
                          <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                            <div class="col-2 p-0">
                              <img class="m-0 p-0"src="{{url($car->getImage())}}" alt="" style="width:100%; object-fit:contain;">
                            </div>
                            <div class="col-6">
                              <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$car->name}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$car->getNormalPrice()}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$car->getTotalStock()}} Units Left</p>
                            </div>
                            <div class="col">
                              <p class="text-danger" style="font-size:20px;font-family:'Times New Roman', Times, serif;">{{$car->getDiscount()}}</p>
                            </div>
                          </div>
                        </a>
                      @endforeach
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-2">
                  @foreach($carmakers as $carmaker)
                    <a id="slist" class="text-dark" href="{{ route('find.car.maker', $carmaker->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($carmaker->getLogo())}}" alt="" style="width:100%; object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$carmaker->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$carmaker->details}}</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-3">
                  @foreach($carmakers as $carmaker)
                    @foreach($carmaker->getModels() as $carmodel)
                      <a id="slist" class="text-dark" href="{{ route('find.car.model', $carmodel->id)}}" style="text-decoration:none;">
                        <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <img class="m-0 p-0"src="{{url($carmodel->getImage())}}" alt="" style="width:100%; height:70px; object-fit:contain;">
                          </div>
                          <div class="col">
                            <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$carmodel->name}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$carmodel->details}}</p>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-4">
                  @foreach($partcategories as $partcategory)
                    @foreach($partcategory->getSubCategories() as $partsubcategory)
                      @foreach($partsubcategory->getParts() as $part)
                        <a id="slist" class="text-dark" href="{{ route('find.part.details', $part->id)}}" style="text-decoration:none;">
                          <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                            <div class="col-2 p-0">
                              <img class="m-0 p-0"src="{{url($part->getImage())}}" alt="" style="width:100%; height:70px; object-fit:contain;">
                            </div>
                            <div class="col-6">
                              <p class="m-0 p-0"style="font-size:15px;font-family:'Times New Roman', Times, serif;">{{$part->name}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$part->getNormalPrice()}}</p>
                              <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{$part->getTotalStock()}} Pieces Left</p>
                            </div>
                            <div class="col">
                              <p class="text-danger" style="font-size:20px;font-family:'Times New Roman', Times, serif;">{{$part->getDiscount()}}</p>
                            </div>
                          </div>
                        </a>
                      @endforeach
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-5">
                  @foreach($partcategories as $partcategory)
                    <a id="slist" class="text-dark" href="{{ route('find.part.category', $partcategory->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($partcategory->getImage())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partcategory->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partcategory->details, 0, 200)}}...</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-6">
                  @foreach($partcategories as $partcategory)
                    @foreach($partcategory->getSubCategories() as $partsubcategory)
                      <a id="slist" class="text-dark" href="{{ route('find.part.subCategory', $partsubcategory->id)}}" style="text-decoration:none;">
                        <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                          <div class="col-2 p-0">
                            <img class="m-0 p-0"src="{{url($partsubcategory->getImage())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                          </div>
                          <div class="col">
                            <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partsubcategory->name}}</p>
                            <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partsubcategory->details, 0, 200)}}...</p>
                          </div>
                        </div>
                      </a>
                    @endforeach
                  @endforeach
                </div>
                <div role="tabpanel" class="tab-pane rounded-0" id="searchBoxTab-7">
                  @foreach($partmanufacturers as $partmanufacturer)
                    <a id="slist" class="text-dark" href="{{ route('find.part.manufacturer', $partmanufacturer->id)}}" style="text-decoration:none;">
                      <div class="row m-0 p-2 pl-0 pr-0 mt-1 mb-1 border rounded-0 bg-light">
                        <div class="col-2 p-0">
                          <img class="m-0 p-0"src="{{url($partmanufacturer->getLogo())}}" alt="" style="width:100%; height:80px;object-fit:contain;">
                        </div>
                        <div class="col">
                          <p class="m-0 p-0"style="font-size:18px;font-family:'Times New Roman', Times, serif;">{{$partmanufacturer->name}}</p>
                          <p class="m-0 p-0"style="font-size:12px;font-family:'Times New Roman', Times, serif;">{{substr($partmanufacturer->details, 0, 200)}}...</p>
                        </div>
                      </div>
                    </a>
                  @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
