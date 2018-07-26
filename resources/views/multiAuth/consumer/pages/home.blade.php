@extends('layout.consumer')

@section('title', 'Home')

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')

    <div style="margin:30px 60px;">
        <!-- category and carousal -->
        <div class="row border" style="background-color:#ffffff;padding:20px;margin:0px 0px;">
            <!-- category col -->
            <div class="col-3 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="row" style="padding:0px;margin-bottom:0px;">
                    <div class="col-sm-12">
                        <span class="fa fa-list d-inline-flex mr-2" style="font-size:25px;color:rgba(33,37,41,0.8);"></span>
                        <h4 class="text-secondary d-inline-flex m-0" style="font-size:25px;line-height:20px;color:rgba(33,37,41,0.8);">Category</h4>
                        <hr>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12 text-secondary">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item" data-bs-hover-animate="pulse" style="padding:0px 10px;">
                              <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">Cars</a>
                            </li>
                            <li class="list-group-item" data-bs-hover-animate="pulse" style="padding:0px 10px;">
                              <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">Cars</a>
                            </li>
                            <li class="list-group-item" data-bs-hover-animate="pulse" style="padding:0px 10px;">
                              <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">Cars</a>
                            </li>
                            <li class="list-group-item" data-bs-hover-animate="pulse" style="padding:0px 10px;">
                              <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">Cars</a>
                            </li>
                            <li class="list-group-item" data-bs-hover-animate="pulse" style="padding:0px 10px;">
                              <span class="d-inline-flex"><i class="fa fa-caret-right text-secondary" style="margin-right:15px;"></i></span>
                              <a class="d-inline-flex nav-link" href="#" style="padding:8px 0px;color:rgba(33,37,41,0.8);font-size:16px;">Cars</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- carousal col -->
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 d-sm-none d-md-none d-lg-block d-xl-block">
                <div class="carousel slide" data-ride="carousel" id="carousel-1">
                    <div class="carousel-inner" role="listbox" style="height:340px;">
                        <div class="carousel-item active">
                          <img src="{{url('FrontEnd/Consumers/assets/img/4278.jpg')}}" alt="" style="width:100%;">
                        </div>
                        <div class="carousel-item">
                          <img src="{{url('FrontEnd/Consumers/assets/img/4226.jpg')}}" alt="" style="width:100%;">
                        </div>
                        <div class="carousel-item">
                          <img src="{{url('FrontEnd/Consumers/assets/img/775.jpg')}}" alt="" style="width:100%;">
                        </div>
                    </div>
                    <div>
                      <a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </div>
            </div>

            <!-- newest trends col -->
            <div class="col-3 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                <div class="row">
                    <div class="col text-right" style="margin:0px;">
                      <h4 class="text-secondary d-inline-flex" style="margin:0px;font-size:25px;line-height:20px;color:rgba(33,37,41,0.8);">Latest</h4>
                      <span class="fa fa-fire d-inline-flex ml-2" style="font-size:25px;color:rgba(33,37,41,0.8);"></span>
                      <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-capitalize">
                        <h5 class="text-secondary" style="line-height:20px;color:rgba(33,37,41,0.8);margin:0px;">Wheels</h5>
                        <hr style="margin-top:5px;">
                    </div>
                    <div class="col-12 text-capitalize">
                        <h5 class="text-secondary" style="line-height:20px;color:rgba(33,37,41,0.8);margin:0px;">Brake System</h5>
                        <hr style="margin-top:5px;">
                    </div>
                </div>
            </div>
        </div>

        <!-- Individual categories -->
        <div style="margin:30px 0px;">
            <!-- categories header -->
            <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                <div class="col-3 align-self-center" style="padding:0px;">
                    <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">SHOCK ABSORBER</h4>
                </div>
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
            </div>

            <!-- category show -->
            <div class="row" style="margin:0px;background-color:#ffffff;padding:0px;">
                <!-- category image -->
                <div class="col-2" style="background-image:url('FrontEnd/Consumers/assets/img/775.jpg');background-size:cover;background-repeat:no-repeat;background-position:center;">
                    <h4 class="text-uppercase" style="margin-top:20px;color:rgba(33,37,41,0.8);">Audi, BMW and many more...</h4>
                </div>

                <!-- sub categories -->
                <div class="col">
                    <div class="row">
                        <div class="col-4 border" style="padding:15px;">
                            <h5 class="text-capitalize" style="color:rgba(33,37,41,0.8);font-weight:normal;">Audi</h5>
                            <img class="float-right" src="{{url('FrontEnd/Consumers/assets/img/775.jpg')}}" data-bs-hover-animate="pulse" style="margin-top:20px;margin-bottom:10px;width:60%;">
                        </div>
                        <div class="col-4 border" style="padding:15px;">
                            <h5 class="text-capitalize" style="color:rgba(33,37,41,0.8);font-weight:normal;">BMW</h5>
                            <img class="float-right" src="{{url('FrontEnd/Consumers/assets/img/775.jpg')}}" style="margin-top:20px;margin-bottom:10px;width:60%;">
                        </div>
                        <div class="col-4 border" style="padding:15px;">
                            <h5 class="text-capitalize" style="color:rgba(33,37,41,0.8);font-weight:normal;">Lamborgini</h5>
                            <img class="float-right" src="{{url('FrontEnd/Consumers/assets/img/775.jpg')}}" style="margin-top:20px;margin-bottom:10px;width:60%;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin:30px 0px;">
            <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                <div class="col-4 align-self-center" style="padding:0px;">
                    <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">Recommendations for you</h4>
                </div>
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
            </div>
            <div class="row" style="background-color:rgba(255,255,255,0);margin:0px;margin-left:-5px;margin-right:-5px;">
                <div class="col border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff; cursor:pointer;"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;">
                    <p>name</p>
                    <h5 style="margin:0px;">US 10,000</h5>
                    <p>10 Pieces Available</p><button class="btn btn-primary btn-sm float-left no-outline" type="button" style="padding:3px 5px;">Book It</button><button class="btn btn-primary btn-sm float-right no-outline" type="button" style="padding:3px 5px;">Apply for Loan</button>
                </div>
                <div
                    class="col border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff;"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;">
                    <p>name</p>
                    <h5 style="margin:0px;">US 10,000</h5>
                    <p>10 Pieces Available</p><button class="btn btn-primary btn-sm float-left no-outline" type="button">Add to Cart</button>
                </div>
                <div class="col border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff;"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;">
                    <p>name</p>
                    <h5 style="margin:0px;">US 10,000</h5>
                    <p>10 Pieces Available</p>
                </div>
                <div class="col border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff;"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;">
                    <p>name</p>
                    <h5 style="margin:0px;">US 10,000</h5>
                    <p>10 Pieces Available</p>
                </div>
                <div class="col border rounded recommended-bg" style="padding:10px;margin:5px;background-color:#ffffff;"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;">
                    <p>name</p>
                    <h5 style="margin:0px;">US 10,000</h5>
                    <p>10 Pieces Available</p>
                </div>
            </div>
        </div>
        <div style="margin:30px 0px;">
            <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                <div class="col-4 align-self-center" style="padding:0px;">
                    <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">my recently viewed items</h4>
                </div>
                <div class="col align-self-center" style="padding:0px;">
                    <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                </div>
            </div>
            <div class="row" style="background-color:#ffffff;margin:0px;">
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
                <div class="col" style="padding:10px;margin:0px;background-color:transperent;cursor:pointer;"><a href="#"><img class="justify-content-center" src="assets/img/36878.jpg" style="width:100%;"></a></div>
            </div>
        </div>
        <div class="row" style="margin:0px;">
            <div class="col" style="padding:0px;margin-right:10px;">
                <div style="margin:5px 0px;">
                    <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                        <div class="col align-self-center" style="padding:0px;">
                            <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">find car by makers</h4>
                        </div>
                        <div class="col align-self-center" style="padding:0px;">
                            <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                        </div>
                    </div>
                    <div class="row" style="background-color:transperent;margin:0px;">
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                    </div>
                </div>
            </div>
            <div class="col" style="margin-left:10px;padding:0px;">
                <div style="margin:5px 0px;">
                    <div class="row" style="padding:0px;margin-bottom:10px;margin-right:0px;margin-left:0px;">
                        <div class="col-8 align-self-center" style="padding:0px;">
                            <h4 class="text-uppercase d-inline" style="margin:0px;color:rgba(33,37,41,0.8);">find part by manufacturers</h4>
                        </div>
                        <div class="col align-self-center" style="padding:0px;">
                            <div class="rounded" style="height:5px;color:rgba(33,37,41,0.8);background-color:rgba(33,37,41,0.11);"></div>
                        </div>
                    </div>
                    <div class="row" style="background-color:transperent;margin:0px;">
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                        <div class="col-2" style="margin:0px;background-color:transperent;cursor:pointer;padding:10px;"><a href="#"><img class="justify-content-center" src="assets/img/Honda.png" style="width:100%;"></a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
  @include('multiAuth.consumer.inc.footer')
@endsection

@section('style')
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/fonts/typicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Customizable-Carousel-swipe-enabled.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Footer-Dark.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-Clean.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/Navigation-with-Search.css') }}">
  <link rel="stylesheet" href="{{ asset('FrontEnd/Consumers/assets/css/styles.css') }}">
@stop

@section('script')
  @include('multiAuth.consumer.js.homejs')

  <script src="{{ asset('FrontEnd/Consumers/assets/js/jquery.min.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/Customizable-Carousel-swipe-enabled.js') }}"></script>
  <script src="{{ asset('FrontEnd/Consumers/assets/js/bs-animation.js') }}"></script>
@stop
