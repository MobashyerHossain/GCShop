@extends('layout.consumer')

@section('title', Auth::user()->getFullName())

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <div class="text-secondary" style="margin:10px 60px;color:rgba(33,37,41,0.8);">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb" style="margin-left:-10px; margin-bottom:0px;">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item active">
            Profile
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{Auth::user()->getFullName()}}
          </li>
        </ol>
      </nav>

      <!-- part image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
              <div class="row" style="background-color:#ffffff;">
                <div class="border col-4 text-center" style="padding:30px 15px;">
                  {!! Form::open(['action' => 'ModelControllers\ImageController@storeProfilePicture', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    {{Form::file('profile_pic', ['id' => 'pro', 'style' => 'display:none;', 'onchange' => 'form.submit()'])}}
                  {!! Form::close() !!}
                  <img class="rounded-circle img-fluid ml-md-3" onclick="proPic()" src="{{url(Auth::user()->getProfilePic())}}" style="cursor:pointer;width:130px;height:130px;object-fit:cover;">
                  <h5 style="letter-spacing:15px;margin:20px 0px;">{{Auth::user()->getFullName()}}</h5>
                </div>
                <div class="border col" style="padding:15px 15px;">
                    @include('multiAuth.consumer.inc.profileInfoForm')
                    @include('multiAuth.consumer.inc.profileEditForm')
                </div>
              </div>

              <!-- my favourites -->
              <div id="my_favourite_items" class="mb-0" style="margin:30px -10px;">
                  <!-- separetor -->
                  <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                      <div class="col-4 align-self-center" style="padding:0px;">
                          <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">My Favourites</h4>
                      </div>
                      <div class="col align-self-center" style="padding:0px;">
                          <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                      </div>
                  </div>

                  <!-- Items -->
                  <div class="row mt-0 mb-0 bg-white" style="margin-left:-5px;margin-right:-5px;">
                      @if(count(Auth::user()->getMyFavourites()) <= 0)
                        <div class="col border pl-0" style="padding:15px;height:180px;">
                          <table style="height: 100%; width:100%">
                            <tbody>
                              <tr>
                                <td class="align-middle">
                                  <h4 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">No Favourite Items</h4>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      @else
                        @foreach(Auth::user()->getMyFavourites() as $favourite)
                          <div class="col-4 border pl-0" style="padding:15px;height:180px;">
                            <div class="row m-0">
                              <div class="col">
                                @if($favourite->getProduct()->getType() == 'car')
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $favourite->getProduct()->id) }}">
                                @else
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $favourite->getProduct()->id) }}">
                                @endif
                                  <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;">{{$favourite->getProduct()->name}}</h5>
                                </a>
                              </div>
                              <div class="col-3 text-center m-0 p-0">
                                {!!Form::open(['action' => ['ModelControllers\MyFavouriteController@destroyFromProfile', $favourite->id], 'method' => 'POST'])!!}
                                  {{Form::hidden('_method', 'DELETE')}}
                                  <a onclick="this.parentNode.submit();" style="cursor:pointer;">
                                    <i class="fa fa-heart" style="float:right;font-size:25px;z-index:1px;margin-top:0px;color:rgba(232,17,45,0.53);"></i>
                                  </a>
                                {!!Form::close()!!}
                              </div>
                            </div>
                            <div class="row m-0">
                              <div class="col-6" style="height:70px;position:absolute;bottom:10px;left:0px;">
                                <h5 class="text-capitalize" style="font-size:16px;font-family: 'Times New Roman', Times, serif;color:rgba(33,37,41,0.8);font-weight:normal;"><span class="text-danger font-weight-bold">{{$favourite->getProduct()->getDiscount()}}</span></h5>
                                <h6 class="m-0 text-secondary" style="font-size:15px;font-family: 'Times New Roman', Times, serif;">{{$favourite->getProduct()->getNormalPrice()}}</h6>
                                <p class="text-secondary" style="font-family: 'Times New Roman', Times, serif;font-size:13px;">{{$favourite->getProduct()->getTotalStock()}} Pieces Left</p>
                              </div>
                              <div class="col-6" style="height:90px;position:absolute;bottom:10px;right:0px;">
                                @if($favourite->getProduct()->getType() == 'car')
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $favourite->getProduct()->id) }}">
                                @else
                                  <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $favourite->getProduct()->id) }}">
                                @endif
                                  <img class="m-0 p-0" src="{{url($favourite->getProduct()->getImage())}}" data-bs-hover-animate="pulse" style="height:90px;width:100%;object-fit:contain;">
                                </a>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      @endif
                  </div>
              </div>
          </div>

          <!-- Recommendation -->
          <div class="col-3" style="margin-left:10px;background-color:#ffffff;padding:0px 10px;">
            <h6 style="margin:10px 0px;">Recommendations</h6>
            <ul class="list-group list-group-flush">
              @foreach((new App\Models\MultiAuth\Consumer())->getRecommendation() as $recommendedProduct)
                @if($recommendedProduct->getType() == 'car')
                  <li class="list-group-item"style="padding:0px 0px;">
                    <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $recommendedProduct->id) }}">
                      <div class="row" style="margin:5px 0px;">
                          <div class="col-3 m-0" style="padding:5px;">
                            <img src="{{ url($recommendedProduct->getImage())}}" class="border-0" style="width:100%;"><br>
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carBooking', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Book This Car" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">B</a>
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carTesting', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Take it for a Test Drive" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">T</a>
                            <a href="{{route('find.carHandling.form', ['form_type' => 'carLoaning', 'car_id' => $recommendedProduct->id])}}" style="line-height:8px;text-decoration:none;font-size:12px;" data-toggle="tooltip" data-placement="top" title="Apply for Car Loan" class="bg-primary text-white p-1 font-weight-bold btn btn-link no-outline rounded-0 p-0 m-0">L</a>
                          </div>
                          <div class="col m-0" style="padding:5px;">
                            <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getShortedName(30)}}</p>
                            <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getNormalPrice()}}</p>
                            <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getTotalStock()}} Pieces Available</p>
                          </div>
                      </div>
                    </a>
                  </li>
                @else
                  <li class="list-group-item"style="padding:0px 0px;">
                    <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $recommendedProduct->id) }}">
                      <div class="row" style="margin:5px 0px;">
                          <div class="col-3" style="padding:5px;">
                            <img src="{{ url($recommendedProduct->getImage())}}" class="border-0" style="width:100%;">
                          </div>
                          <div class="col" style="padding:5px;">
                              <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getShortedName(20)}}</p>
                              <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getNormalPrice()}}</p>
                              <p class="m-0 text-secondary" style="font-size:13px;font-family: 'Times New Roman', Times, serif;">{{$recommendedProduct->getTotalStock()}} Pieces Left</p>
                          </div>
                          <div class="col-2">
                            {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                                {{Form::hidden('consumer_id', Auth::id(), [])}}
                                {{Form::hidden('part_id', $recommendedProduct->id, [])}}
                                {{Form::number('quantity', 1, ['min' => 1, 'max' => $recommendedProduct->getTotalStock(), 'style' => 'width:40px;height:20px;position:absolute;right:20px;top:3px;'])}}
                                <button style="position:absolute; right:0px;"class="btn btn-link no-outline rounded-0 p-0 m-0" type="submit"><i class="fa fa-shopping-cart"></i></button>
                            {!! Form::close() !!}
                          </div>
                      </div>
                    </a>
                  </li>
                @endif
              @endforeach
            </ul>
          </div>
      </div>
    </div>
  </div>

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
  <script>
    //error while updating info
    $( document ).ready(function() {
      if({{count($errors) > 0}}){
        document.getElementById("infoForm").style.display = "none";
        document.getElementById("editForm").style.display = "block";
      }
    });
  </script>

  <script>
    //scroll to my favourites
    $( document ).ready(function() {
      if("{{Session::has('show_favourites')}}"){
        $('html, body').animate({
            scrollTop: $('#my_favourite_items').offset().top - 70
        }, 'slow');
      }
    });
  </script>

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
