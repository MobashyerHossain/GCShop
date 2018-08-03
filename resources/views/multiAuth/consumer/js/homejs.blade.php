<!--Show Login Error-->
<script>user_not_found
  if("{{Session::has('user_not_found')}}"){
    swal("Login Failed!", "{{Session::get('user_not_found')}}", "error");
  }
</script>

<!--Account Verification Request Alart-->
<script>
  if("{{Session::has('please_verify')}}"){
    swal("Please Verify!", "{{Session::get('please_verify')}}", "info");
  }
</script>

<!--Account Not Verification Alart-->
<script>
  if("{{Session::has('not_verified')}}"){
    swal("Not Varified!", "{{Session::get('not_verified')}}", "error");
  }
</script>

<!--Account Verification verified Alart-->
<script>
  if("{{Session::has('verification_status')}}"){
    swal("Good Job!", "{{Session::get('verification_status')}}", "success");
  }
</script>

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

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
