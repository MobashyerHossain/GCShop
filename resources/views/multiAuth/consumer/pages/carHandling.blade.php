@extends('layout.consumer')

@section('title', 'Car Booking')

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
            Car Booking for {{$car->name}}
          </li>
        </ol>
      </nav>

      <!-- part image and detail -->
      <div class="row mt-0" style="margin:10px 0px;">
          <div class="col" style="margin-right:10px;background-color:rgba(255,255,255,0);">
              <div class="row" style="margin-bottom:20px; height:450px; background-color:#ffffff;">
                  <!-- part image -->
                  @include('multiAuth.consumer.inc.carDetailImageSection')

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
                                  @foreach($car->getDetails() as $cardetail)
                                    <tr  class="border-top-0">
                                      <td class="border-top-0" style="width:30%; font-family: 'Times New Roman', Times, serif;">{{$cardetail->detail_criteria}}</td>
                                      <td class="border-top-0" style="font-family: 'Times New Roman', Times, serif;">: {{$cardetail->detail}}</td>
                                    </tr>
                                  @endforeach
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>

              <!-- detail pane -->
              <div id="handling" class="row border" style="margin-top:20px;background-color:#ffffff;">
                  <div class="col">
                      <div>
                          <ul class="nav nav-pills border-bottom" style="margin-top:10px;">
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0 active" role="tab" data-toggle="pill" href="#tab-1" style="padding:5px;">Book This Car</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-2" style="padding:5px;">Take a Test Drive</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link border rounded-0 border-bottom-0" role="tab" data-toggle="pill" href="#tab-3" style="padding:5px;">Apply for a Loan</a>
                              </li>
                          </ul>
                          <div class="tab-content mt-4">
                              <!-- Booking tab -->
                              <div class="tab-pane fade show active" role="tabpanel" id="tab-1">
                                @include('multiAuth.consumer.inc.payment')
                              </div>
                              <!-- Testing tab -->
                              <div class="tab-pane fade" role="tabpanel" id="tab-2">
                                @include('multiAuth.consumer.inc.payment')
                              </div>
                              <!-- Loaning tab -->
                              <div class="tab-pane fade" role="tabpanel" id="tab-3">

                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          @include('multiAuth.consumer.inc.carDetailsSidebar')
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
  <!--scroll helper-->
  <script>
    $( document ).ready(function() {
        var pathname = window.location.pathname;

        if(pathname.indexOf("carBooking") != -1){
            $('a[href="#tab-1"]').click();
        }
        else if(pathname.indexOf("carTesting") != -1){
            $('a[href="#tab-2"]').click();
        }
        else{
            $('a[href="#tab-3"]').click();
        }
    });
  </script>
  <script>
    $(document).ready(function () {
      // Handler for .ready() called.
      $('html, body').animate({
          scrollTop: $('#handling').offset().top - 70
      }, 'slow');
    });
  </script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
