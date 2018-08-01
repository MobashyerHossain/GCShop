<nav class="fixed-top">
  <div class="" style="background-color:#ffffff;box-shadow:0 2px 10px rgba(0, 0, 0, 0.2);">
      <div class="row" style="margin:0px;">
          <!--logo-->
          <div class="col-2">
            <a href="{{route('index')}}" class="h4 nav-link" style="font-family: Cookie, cursive;margin:0px;line-height:20px;color:rgba(33,37,41,0.8);padding-top:0px;padding-bottom:0px;padding-left:15px;line-height:70px;">
              {{ config('app.name', 'Laravel') }}
            </a>
          </div>

          @include('multiAuth.consumer.inc.searchbox')

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
            <div class="hover-dropdown-content p-3 border" style="width:250px;padding:10px;right:0px;top:70px;background-color:#ffffff;  box-shadow: 3px 3px 12px #888888;">
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
          @include('multiAuth.consumer.inc.cart')
      </div>
  </div>
</nav>
