<div class="sidebar" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper pt-2">
        <div class="author col-12 text-center">
          <a href="{{ route('admin.profile') }}">
              <img class="avatar border-gray rounded-circle m-2" style="width:80px;" src="{{ url(Auth::user()->getProfilePic()) }}" alt="{{Auth::user()->getProfilePic()}}">
              <h5 class="title">{{ Auth::user()->getFullName() }}</h5>
          </a>
        </div>
        <ul class="nav">
            <li class="" onclick="">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="nc-icon nc-chart-pie-35"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="{{ route('admin.profile') }}">
                    <i class="nc-icon nc-circle-09"></i>
                    <p>User Profile</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="./table.html">
                    <i class="nc-icon nc-notes"></i>
                    <p>Table List</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="./typography.html">
                    <i class="nc-icon nc-paper-2"></i>
                    <p>Typography</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="./icons.html">
                    <i class="nc-icon nc-atom"></i>
                    <p>Icons</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="./maps.html">
                    <i class="nc-icon nc-pin-3"></i>
                    <p>Maps</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="./notifications.html">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
  // Get the container element
  var btnContainer = document.getElementByClassName("side-nav");

  // Get all buttons with class="btn" inside the container
  var btns = btnContainer.getElementsByClassName("");

  // Loop through the buttons and add the active class to the current/clicked button
  for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
  }
</script>
