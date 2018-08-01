@extends('layout.consumer')

@section('title', $cars[0]->getModel()->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')

    <!-- Banner -->
    <div style="height:290px;" class="m-0 p-0">
      <img src="{{url($cars[0]->getModel()->getImage())}}" style="width:100%; height:300px; object-fit:cover;" alt="">
    </div>

    <div style="margin:10px 60px;">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="#">{{$cars[0]->getModel()->getMaker()->name}}</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$cars[0]->getModel()->name}}
          </li>
        </ol>
      </nav>

      <!-- car list -->
      <div class="row">
          @foreach($cars as $car)
          <div class="col-2 border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff; cursor:pointer;">
              <a class="nav nav-link m-0 p-0" href="{{ route('find.car.details', $car->id) }}">
                <div class="" style="height:155px;">
                  <img class="justify-content-center" src="{{url($car->getImage())}}" style="width:100%; height:150px; object-fit: contain;">
                </div>
                <h5 class="m-0 text-danger font-weight-bold text-right" style="font-family: 'Times New Roman', Times, serif;">{{$car->getDiscount()}}</h5>
                <p class="text-secondary" style="height:35px;font-size:13px; font-family: Verdana, Geneva, Tahoma, sans-serif;">{{$car->name}}</p>
                <h6 class="m-0 text-secondary" style="font-family: 'Times New Roman', Times, serif;">{{$car->getNormalPrice()}}</h6>
                <p class="text-secondary" style="font-size:13px;">{{$car->getTotalStock()}} Pieces Available</p>
              </a>
          </div>
          @endforeach
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
