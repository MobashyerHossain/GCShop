@extends('layout.consumer')

@section('title', $parts[0]->getSubCategory()->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')

    <!-- Banner -->
    <div style="height:290px;" class="row m-0 p-0">
      <div class="col m-0 p-0">
        <img src="{{url($parts[0]->getSubCategory()->getCategory()->getImage())}}" style="width:100%;height:300px;object-fit:cover;" alt="">
      </div>
      <div class="col m-0 p-0">
        <img src="{{url($parts[0]->getSubCategory()->getImage())}}" style="width:100%;height:300px;object-fit:cover;" alt="">
      </div>
    </div>

    <div style="margin:30px 60px;">
      <!-- breadcrumbs -->
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="background-color:transparent;">
          <li class="breadcrumb-item">
            <a style="text-decoration: none;" href="#">{{$parts[0]->getSubCategory()->getCategory()->name}}</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">
            {{$parts[0]->getSubCategory()->name}}
          </li>
        </ol>
      </nav>

      <!-- part list -->
      <div class="row">
          @foreach($parts as $part)
          <div class="col-2 border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff; cursor:pointer;">
            <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $part->id) }}">
              <div class="" style="height:200px;">
                <img class="justify-content-center" src="{{url($part->getImage())}}" style="width:100%; height:200px; object-fit: contain;">
              </div>
              <h5 class="m-0 text-danger font-weight-bold text-right" style="font-family: 'Times New Roman', Times, serif;">{{$part->getDiscount()}}</h5>
              <p class="text-secondary" style="height:35px;font-size:13px; font-family: Verdana, Geneva, Tahoma, sans-serif;">{{$part->name}}</p>
              <h6 class="m-0 text-secondary" style="font-family: 'Times New Roman', Times, serif;">{{$part->getNormalPrice()}}</h6>
              <p class="text-secondary" style="font-size:13px;">{{$part->getTotalStock()}} Pieces Available</p>
            </a>
            @if(Auth::check())
              {!! Form::open(['action' => 'ModelControllers\CartController@store', 'method' => 'POST']) !!}
                  {{Form::hidden('consumer_id', Auth::id(), [])}}
                  {{Form::hidden('part_id', $part->id, [])}}
                  {{Form::number('quantity', 1, ['min' => 1, 'max' => $part->getTotalStock(), 'class' => 'no-outline'])}}
                  <button class="btn btn-primary float-right no-outline rounded-0 btn-sm" type="submit">Add to <i class="fa fa-shopping-cart"></i></button>
              {!! Form::close() !!}
            @else
              <button class="btn-primary float-right no-outline rounded-0 btn-sm" data-toggle="modal" data-target="#LoginModalCenter" type="button">Add to <i class="fa fa-shopping-cart"></i></button>
            @endif
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
