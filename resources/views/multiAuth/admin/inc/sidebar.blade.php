<div class="sidebar" data-image="{{ asset('assets/img/sidebar-5.jpg') }}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
    -->
    <div class="sidebar-wrapper pt-2">
        <div class="author col-12 text-center">
          {!! Form::open(['action' => 'ModelControllers\ImageController@storeProfilePicture', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::hidden('user_type', 'admin')}}
            {{Form::file('profile_pic', ['id' => 'pro', 'style' => 'display:none;', 'onchange' => 'form.submit()'])}}
          {!! Form::close() !!}
          <img class="avatar border-gray rounded-circle m-2" onclick="proPic()" style="width:80px;height:80px;object-fit:cover;cursor:pointer;" src="{{ url(Auth::user()->getProfilePic()) }}" alt="{{Auth::user()->getProfilePic()}}">
          <h5 class="title">{{ Auth::user()->getFullName() }}</h5>
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
                    <p>My Profile</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-plus"></i>
                    <p>Add Admin</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-plus"></i>
                    <p>Add ShowRoom</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-atom"></i>
                    <p>Loan Requests</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="fa fa-users"></i>
                    <p>All Admins</p>
                </a>
            </li>
            <li class="">
                <a class="nav-link" href="">
                    <i class="nc-icon nc-bell-55"></i>
                    <p>Notifications</p>
                </a>
            </li>
        </ul>
    </div>
</div>
