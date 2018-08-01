@extends('layout.consumer')

@section('title', $parts[0]->getManufacturer()->name)

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')

    <!-- Banner -->
    <div style="height:290px;" class="m-0 p-0 bg-white">
      <img class="mt-3" src="{{url($parts[0]->getManufacturer()->getLogo())}}" style="width:100%; height:250px; object-fit:contain;" alt="">
    </div>

    <div style="margin:10px 60px;">
      <div class="m-0 p-0">
        <!--parts -->
        <div style="margin:30px 0px;">
            <!-- categories header -->
            <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
                <div class="col-4 align-self-center" style="padding:0px;">
                    <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">{{$parts[0]->getManufacturer()->name}}</h4>
                </div>
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
            </div>

            <!-- parts show -->
            <div class="row" style="margin:0px;background-color:#ffffff;padding:0px;">
                <!-- parts -->
                <div class="col">
                    <div class="row">
                        @foreach($parts as $part)
                          <div class="col-3 border" style="padding:15px;position:relative;height:200px;">
                            <a class="nav nav-link m-0 p-0" href="{{ route('find.part.details', $part->id) }}">
                              <h5 class="text-capitalize" style="font-size:16px;color:rgba(33,37,41,0.8);font-weight:normal;">{{$part->name}}</h5>
                              <img class="float-right" src="{{url($part->getImage())}}" data-bs-hover-animate="pulse" style="width:60%;position:absolute;bottom:10px;right:10px;">
                            </a>
                          </div>
                        @endforeach
                        <!-- coming soon -->
                        <div class="col border text-truncate" style="padding:15px;position:relative;height:200px;">
                          <table style="height: 100%; width:100%">
                            <tbody>
                              <tr>
                                <td class="align-middle">
                                  <h3 class="text-capitalize text-center" style="color:rgba(33,37,41,0.8);">More<br>Coming Soon</h3>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                    </div>
                </div>
            </div>
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
