@extends('layout.app')

@section('title', 'Home')

@section('content')
  @include('multiAuth.consumer.inc.navbar')
  <div class="content">
    <!-- Login Modal -->
    @include('multiAuth.consumer.inc.modals.loginModal')
    <!-- Register Modal -->
    @include('multiAuth.consumer.inc.modals.registerModal')
  </div>
@endsection

@section('style')

@stop

@section('script')
  <!--Script for uploading and changing profile pic-->
  <script>
    function uploadImage(){
      document.getElementById("profile_pic").click();
    }

    $(function(){
      $('#profile_pic').change(function(){
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
        if (input.files && input.files[0]&& (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg"))
         {
            var reader = new FileReader();

            reader.onload = function (e) {
               $('#pro_pic').attr('src', e.target.result);
            }
           reader.readAsDataURL(input.files[0]);
        }
        else
        {
          $('#pro_pic').attr('src', 'storage/images/male.png');
        }
      });
    });
  </script>
@stop
