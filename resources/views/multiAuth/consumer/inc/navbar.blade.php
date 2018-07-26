<nav class="fixed-top">
  <div class="" style="background-color:#ffffff;box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);">
      <div class="row" style="margin:0px;">
          <!--logo-->
          <div class="col-2">
            <a href="{{route('index')}}" class="h3 nav-link" style="margin:0px;line-height:20px;color:rgba(33,37,41,0.8);padding-top:0px;padding-bottom:0px;padding-left:15px;line-height:70px;">
              {{ config('app.name', 'Laravel') }}
            </a>
          </div>

          <!--Search Engine-->
          <div class="col-6">
              <div class="input-group border border-primary" style="margin-top:15px;">
                  <div class="input-group-prepend">
                      <div class="dropdown btn-group" role="group">
                        <button class="btn btn-primary dropdown-toggle rounded-0 no-outline" data-toggle="dropdown" aria-expanded="false" type="button">
                          Product
                        </button>
                        <div class="dropdown-menu rounded-0 m-0" role="menu">
                          <a class="dropdown-item" role="presentation" href="#">Cars</a>
                          <a class="dropdown-item" role="presentation" href="#">Parts</a>
                        </div>
                      </div>
                  </div>
                  <input class="form-control no-outline" type="text">
                  <div class="input-group-append">
                    <!--Search Button-->
                    <button class="btn btn-primary rounded-0 no-outline"  data-toggle="dropdown" aria-expanded="false" type="button">
                      Search
                      <span style="margin-left:5px;" class="fa fa-search"><i ></i></span>
                    </button>

                    <!--Search Items-->
                    <div class="dropdown-menu rounded-0 p-2" role="menu">
                      <div class="row">
                        <div class="col">
                          frgdfhgdrf
                        </div>
                        <div class="col">
                          dfhdrfhdf
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
          </div>

          <!--Login-->
          <?php
            //Get correct Authentication guard
            $guard = substr(Auth::getProvider()->getModel(),21);
            switch ($guard) {
              case 'Admin':
                $logout = 'admin.logout';
                break;
              case 'Consumer':
                $logout = 'consumer.logout';
                break;
              case 'ShowRoomStaff':
                $logout = 'showroomstaff.logout';
                break;
              default:
                $logout = 'consumer.logout';
                break;
            }

            //get profile pic
            $pp = "storage/Images/temp.png";
            if (Auth::check()) {
              if(Auth::user()->getProfilePic()){
                $pp = Auth::user()->getProfilePic();
              }
            }
          ?>
          <div class="hover-dropdown col p-0">
            <div class="dropbtn no-outline pl-3 pt-2 text-right mr-1" style="cursor:pointer;width:95%;">
                @guest
                    <i class="fa fa-user float-left pt-0 mt-0 mb-0 pb-0" style="font-size:30px;color:rgb(162,171,180);padding:5px;margin-top:auto;line-height:60px;"></i>
                    <div class="float-left mt-3">
                      <a class="d-inline-flex nav-link no-outline" href="" data-toggle="modal" data-target="#LoginModalCenter" style="padding:5px;color:rgba(33,37,41,0.8); font-size:13px;">Sign In</a>
                      <h6 class="d-inline-flex" style="margin-left:3px;margin-right:3px;color:rgba(33,37,41,0.8);">|</h6>
                      <a class="d-inline-flex nav-link no-outline" href="" data-toggle="modal" data-target="#RegisterModalCenter" style="padding:5px;color:rgba(33,37,41,0.8); font-size:13px;">Join Free</a>
                    </div>
                @else
                    <img class="ml-2 float-left rounded-circle" src="{{url($pp)}}" alt="{{$pp}}" style="width:50px;">
                    <p class="mt-2 mb-0" style="color:rgb(162,171,180);">{{ Auth::user()->getFullName() }}</p>
                @endguest
            </div>

            <!-- sign in dropdown-->
            <div class="hover-dropdown-content p-3 border" style="width:250px;padding:10px;right:0px;top:70px;background-color:#eaeaea;">
              @guest
                <h6 style="color:rgba(33,37,41,0.8);">Get Started Now</h6>
                <div class="row" style="margin-right:-10px;margin-left:-10px;margin-bottom:5px;margin-top:15px;">
                    <div class="col">
                      <button class="btn btn-primary btn-sm float-left rounded-0 no-outline" type="button" data-toggle="modal" data-target="#LoginModalCenter">Sign In</button>
                    </div>
                    <div class="col">
                      <button class="btn btn-primary btn-sm float-right rounded-0 no-outline" type="button" data-toggle="modal" data-target="#RegisterModalCenter">Join Free</button>
                    </div>
                </div>
                <p class="text-center" style="margin:10px;margin-top:0px;color:rgba(33,37,41,0.8);">Or Continue with:</p>
                <div class="text-center" style="color:rgba(33,37,41,0.8);">
                  <a href="#">
                    <i class="fa fa-github" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-facebook-official" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-instagram" style="font-size:30px;margin:0px 10px;color:rgba(33,37,41,0.8);"></i>
                  </a>
                </div>
              @else
                <h6 style="color:rgba(33,37,41,0.8);">Welcome back</h6>
              @endguest
                <h6 style="padding:5px;background-color:rgba(33,37,41,0.11);margin-top:20px;margin-bottom:10px;margin-right:-15px;margin-left:-15px;font-weight:600;color:rgba(33,37,41,0.8);">My Shop</h6>
                <ul class="list-group list-group-flush p-0 m-0">
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">My Account</a>
                    </li>
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">My Orders</a>
                    </li>
                  @guest
                  @else
                    <li class="list-group-item border-top-0 m-0" style="padding:2px;background-color:transparent;">
                      <a href="{{ route($logout) }}" style="text-decoration:none;color:rgba(33,37,41,0.8);">Log Out</a>
                    </li>
                  @endguest
                </ul>
            </div>
          </div>

          <!--Cart-->
          <div class="hover-dropdown col p-0" style="background-color:rgba(179,179,179,0.22);cursor:pointer;">
            <div class="dropbtn no-outline p-0">
              <i class="fa fa-shopping-cart float-left mr-3 ml-2" style="cursor:pointer;font-size:30px;color:rgb(162,171,180);padding:5px;"></i>
              @guest
                <ul class="list-group list-group-flush p-0 m-0 inline-flex mt-3 text-left" style="font-size: 12px;">
                  <li class="list-group-item border-top-0 m-0 p-0 font-weight-bold"style="background-color:transparent;">
                    <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">0 Products</a>
                  </li>
                  <li class="list-group-item border-top-0 m-0 p-0 border-bottom-0 font-weight-bold" style="background-color:transparent;">
                    <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">$ 0.00 USD</a>
                  </li>
                </ul>
              @else
                <ul class="list-group list-group-flush p-0 m-0 inline-flex mt-3 text-left" style="font-size: 12px;">
                  <li class="list-group-item border-top-0 m-0 p-0 font-weight-bold"style="background-color:transparent;">
                    <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">{{count(Auth::user()->getCartProducts())}} Products</a>
                  </li>
                  <li class="list-group-item border-top-0 m-0 p-0 border-bottom-0 font-weight-bold" style="background-color:transparent;">
                    <a href="#" style="text-decoration:none;color:rgba(33,37,41,0.8);">$ {{Auth::user()->getTotalCostPerCart()}} USD</a>
                  </li>
                </ul>
              @endguest
            </div>

            <!--Cart dropdown-->
            <div class="hover-dropdown-content border" style="right:0px;top:70px;width:300px;">
              @guest
                <h6 class="text-center mt-1">No Products</h6>
              @else
                @if(count(Auth::user()->getCartProducts()) <= 0)
                  <h6 class="text-center mt-1">No Products</h6>
                @else
                  <h6 class="p-1" style="padding:0px;background-color:rgba(33,37,41,0.11);margin-bottom:10px;font-weight:600;color:rgba(33,37,41,0.8);">List of Products</h6>
                  <ul class="list-group list-group-flush p-0 m-0">
                    @foreach(Auth::user()->getCartProducts() as $product)
                      <li class="list-group-item border-top-0 m-1" style="padding:2px;background-color:transparent;">
                        <a href="" style="text-decoration:none;color:rgba(33,37,41,0.8);">
                          <div class="row m-0">
                            <div class="col-2 p-0">
                              @if($product->getPart()->getPhoto())
                                <img class="" src="{{url($product->getPhoto())}}" alt="" style="width:100%;">
                              @else
                                <img class="" src="{{url('storage/Images/temp.png')}}" alt="" style="width:100%;">
                              @endif
                            </div>
                            <div class="col-6" style="font-size:13px;">
                              {{$product->quantity.' X '.$product->getPart()->name}}
                            </div>
                            <div class="col-4 p-0 m-0" style="font-size:14px;">
                              $ {{$product->getTotalPartCost()}} <span style="font-size:8px;">USD</span>
                            </div>
                          </div>
                        </a>
                      </li>
                    @endforeach
                  </ul>
                  <h6 class="p-1 border-top" style="font-size:15px;padding:0px;margin-bottom:10px;color:rgba(33,37,41,0.8);">
                    Total Cost : <span class="float-right">$ {{Auth::user()->getTotalCostPerCart()}} USD</span>
                  </h6>
                @endif
              @endguest
            </div>
          </div>
      </div>
  </div>
</nav>
