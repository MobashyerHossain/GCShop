@extends('layout.consumer')

@section('title', $car->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')

    <div class="text-secondary" style="margin:10px 60px;color:rgba(33,37,41,0.8);">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb" style="margin-left:-10px; margin-bottom:0px;">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="{{route('find.car.maker', $car->getModel()->getMaker()->id)}}">{{$car->getModel()->getMaker()->name}}</a>
          </li>
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="{{ route('find.car.model', $car->getModel()->id) }}">{{$car->getModel()->name}}</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$car->name}}
          </li>
        </ol>
      </nav>

      <!-- part image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
              <div class="row" style="margin-bottom:20px; height:400px; background-color:#ffffff;">
                  <!-- part image -->
                  <div class="col-5 text-center border">
                      @if(Auth::check())
                        @if(count($car->isAlreadyFavourited()) > 0)
                          {!!Form::open(['action' => ['ModelControllers\MyFavouriteController@destroy', $car->isAlreadyFavourited()->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            <a onclick="this.parentNode.submit();" style="cursor:pointer;">
                              <i class="fa fa-heart" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
                            </a>
                          {!!Form::close()!!}
                        @else
                          {!! Form::open(['action' => 'ModelControllers\MyFavouriteController@store', 'method' => 'POST', 'name' => 'statuspost']) !!}
                              {{Form::hidden('product_type', $car->getType(), [])}}
                              {{Form::hidden('product_id', $car->id, [])}}
                              <a onclick="this.parentNode.submit();" style="cursor:pointer;">
                                <i class="fa fa-heart-o" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
                              </a>
                          {!! Form::close() !!}
                        @endif
                      @else
                        <a onclick="" data-toggle="modal" data-target="#LoginModalCenter" style="cursor:pointer;">
                          <i class="fa fa-heart-o" style="float:right;font-size:30px;z-index:1px;margin-top:10px;color:rgba(232,17,45,0.53);"></i>
                        </a>
                      @endif
                      <a href="#" class="no-outline" style="text-decoration:none; padding-top:0px;" data-toggle="modal" data-target="#viewFullScreen">
                        <img src="{{url($car->getImage())}}" style="width:100%;padding-bottom:5px; height:200px; object-fit: cover;">
                        <i class="fa fa-search-plus"></i>View Full Screen
                      </a>

                      <!-- Fullscreen car image Modal -->
                      <div class="modal fade" id="viewFullScreen" tabindex="-1" role="dialog" aria-labelledby="viewFullScreenTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content rounded-0 border-0">
                            <div class="modal-body">
                              <img src="{{url($car->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
                            </div>
                          </div>
                        </div>
                      </div>

                      <!-- Extra Car Image -->
                      <div class="row" style="margin-right:-10px;margin-left:-10px;margin-bottom:15px;">
                        @foreach($car->getExtraImage() as $extra)
                          <!-- Button trigger modal -->
                          <div class="col-4 text-left p-2" style="padding:0px;">
                            <a href="" data-toggle="modal" data-target="#carfullview{{$extra->id}}">
                              <img src="{{url($extra->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
                            </a>
                          </div>

                          <!-- Extra image Modal -->
                          <div class="modal fade" id="carfullview{{$extra->id}}" tabindex="-1" role="dialog" aria-labelledby="carfullview{{$extra->id}}Title" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content rounded-0 border-0">
                                <div class="modal-body">
                                  <img src="{{url($extra->getImage())}}" data-bs-hover-animate="pulse" style="width:100%; object-fit: contain;">
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                  </div>

                  <!-- part summary -->
                  <div class="col border" style="padding:15px;font-family: 'Times New Roman', Times, serif;">
                      <h4 class="float-left text-capitalize">{{$car->name}} {{$car->getModel()->name}}</h4>
                      <h1 class="float-right text-danger">{{$car->getDiscount()}}</h1>
                      <div class="table-responsive" style="margin-top:80px;">
                          <table class="table table-sm">
                              <tbody>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Selling Price</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getNormalPrice()}}</td>
                                  </tr>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Discounted Price</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getDiscountedPrice()}}</td>
                                  </tr>
                                  <tr class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">Piece Available</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$car->getTotalStock()}}</td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div style="position:absolute; bottom:30px; width:100%;">
                        <div class="row m-0 p-0 mr-3">
                          <div class="col">
                            <button class="btn btn-primary text-center no-outline rounded-0" type="button">Book It</button>
                          </div>
                          <div class="col">
                            <button class="btn btn-primary text-center no-outline rounded-0" type="button">Test It</button>
                          </div>
                          <div class="col">
                            <button class="btn btn-primary text-center no-outline rounded-0" type="button">Apply for Loan</button>
                          </div>
                        </div>
                      </div>
                  </div>
              </div>

              <!-- detail pane -->
              <div class="row border" style="margin-top:20px;background-color:#ffffff;">
                  <div class="col">
                      <div>
                          <ul class="nav nav-pills border-bottom" style="margin-top:10px;">
                              <li class="nav-item"><a class="nav-link border rounded-0 border-bottom-0 active" role="tab" data-toggle="pill" href="#tab-1" style="padding:5px;">Car Details</a></li>
                              <li class="nav-item"><a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-2" style="padding:5px;margin:0px 5px;">Maker Details</a></li>
                          </ul>
                          <div class="tab-content">
                              <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                                  <div class="table-responsive" style="margin-top:20px;margin-bottom:10px;">
                                      <p>{{$car->getModel()->details}}.</p>
                                      @if(count($car->getDetails()) > 0)
                                        <table class="table table-sm">
                                            <tbody>
                                              @foreach($car->getDetails() as $cardetail)
                                                <tr>
                                                    <td class="border-top-0" style="width:30%;">{{$cardetail->detail_criteria}}</td>
                                                    <td class="border-top-0 text-center" style="width:10%;">:</td>
                                                    <td class="border-top-0">{{$cardetail->detail}}</td>
                                                </tr>
                                              @endforeach
                                            </tbody>
                                        </table>
                                      @endif
                                  </div>
                              </div>
                              <div class="tab-pane fade" role="tabpanel" id="tab-2">
                                  <div class="row">
                                      <div class="col-8">
                                          <div class="table-responsive" style="margin-top:20px;margin-bottom:10px;">
                                              <p>{{$car->getModel()->getMaker()->details}}</p>
                                          </div>
                                      </div>
                                      <div class="col" style="padding:10px;">
                                        <img src="{{url($car->getModel()->getMaker()->getLogo())}}" style="width:100%;">
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

          <!-- You may also like -->
          <div class="col-3" style="margin-left:10px;background-color:#ffffff;padding:0px 10px;">
              <h6 style="margin:10px 0px;">You May Like</h6>
              <ul class="list-group list-group-flush">
                @foreach($car->getModel()->getMaker()->getModels() as $carmodel)
                    @foreach($carmodel->getCars() as $morecar)
                      @if($morecar->id != $car->id)
                      <li class="list-group-item"style="padding:0px 0px;">
                        <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $morecar->id) }}">
                          <div class="row" style="margin:5px 0px;">
                              <div class="col-3" style="padding:5px;">
                                <img src="{{ url($morecar->getImage())}}" class="border-0" style="width:100%;">
                              </div>
                              <div class="col" style="padding:5px;">
                                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getShortedName(30)}}</p>
                                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getNormalPrice()}}</p>
                                  <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$morecar->getTotalStock()}} Pieces Available</p>
                              </div>
                          </div>
                        </a>
                      </li>
                      @endif
                    @endforeach
                @endforeach
              </ul>
          </div>
      </div>
    </div>
  </div>
  @include('multiAuth.consumer.inc.footer')
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Customizable-Carousel-swipe-enabled.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/typicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Customizable-Carousel-swipe-enabled.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Pretty-Footer.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Footer-Basic.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Footer-Dark.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-Clean.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-with-Search.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/styles.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@stop

@section('script')
  @include('multiAuth.consumer.js.homejs')

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
