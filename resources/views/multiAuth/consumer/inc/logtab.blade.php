<!-- Authentication Links -->
@guest
    <li class="nav-item">
      <a class="nav-link" href="" data-toggle="modal" data-target="#LoginModalCenter">{{ __('Login') }}</a>
    </li>
    <li class="nav-item">
      <a id="RegisterModal" class="nav-link" href="" data-toggle="modal" data-target="#RegisterModalCenter">{{ __('Register') }}</a>
    </li>
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <img src="Auth::user()->profile_pic" alt="">{{ Auth::user()->getFullName() }} <span class="caret"></span>
        </a>

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
        ?>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route($logout) }}">
                {{ __($logout) }}
            </a>
        </div>
    </li>
@endguest
