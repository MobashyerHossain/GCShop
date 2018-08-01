<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 footer-navigation">
                <h4>
                  <a class="text-secondary" href="{{ route('index')}}" style="text-decoration:none;">Grim Reapers Automobiles</a>
                </h4>
                <p class="links">
                  <a href="#">Cars</a>
                  <strong> · </strong>
                  <a href="#">Spare Parts</a>
                </p>
                <p class="company-name">Designed by Grim Reapers © 2018</p>
            </div>

            <div class="col-md-4 col-sm-6 footer-contacts mt-0">
                <div>
                  <span class="fa fa-map-marker footer-contacts-icon"></span>
                  <p class="mt-2">
                    <span class="new-line-span">Bashundhara , Baridhara, B block</span> Dhaka, Bangladesh
                  </p>
                </div>
                <div>
                  <span class="fa fa-phone footer-contacts-icon"></span>
                  <p class="footer-center-info email text-left mt-2"> +8801676409204</p>
                </div>
                <div>
                  <span class="fa fa-envelope footer-contacts-icon"></span>
                  <p class="footer-center-info email text-left mt-2">support@grimreapers.com</p>
                </div>
            </div>

            <div class="col-md-4 footer-about">
                <h4>About the company</h4>
                <p>One of the finest places for car inventory: providing different car models, appropiate services &amp; relaiable accessories.</p>
                <div class="social-links social-icons">
                  <a href="#">
                    <i class="fa fa-facebook text-secondary" style="font-size:16px;"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-twitter text-secondary" style="font-size:16px;"></i>
                  </a>
                  <a href="#">
                    <i class="fa fa-linkedin text-secondary" style="font-size:16px;"></i>
                </a>
                <a href="#">
                  <i class="fa fa-instagram text-secondary" style="font-size:16px;"></i>
                </a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    var ScrollSneak = function(prefix, wait) {
      // clean up arguments (allows prefix to be optional - a bit of overkill)
      if (typeof(wait) == 'undefined' && prefix === true) prefix = null, wait = true;
      prefix = (typeof(prefix) == 'string' ? prefix : window.location.host).split('_').join('');
      var pre_name;

      // scroll function, if window.name matches, then scroll to that position and clean up window.name
      this.scroll = function() {
          if (window.name.search('^'+prefix+'_(\\d+)_(\\d+)_') == 0) {
              var name = window.name.split('_');
              window.scrollTo(name[1], name[2]);
              window.name = name.slice(3).join('_');
          }
      }
      // if not wait, scroll immediately
      if (!wait) this.scroll();

      this.sneak = function() {
    // prevent multiple clicks from getting stored on window.name
    if (typeof(pre_name) == 'undefined') pre_name = window.name;

    // get the scroll positions
          var top = 0, left = 0;
          if (typeof(window.pageYOffset) == 'number') { // netscape
              top = window.pageYOffset, left = window.pageXOffset;
          } else if (document.body && (document.body.scrollLeft || document.body.scrollTop)) { // dom
              top = document.body.scrollTop, left = document.body.scrollLeft;
          } else if (document.documentElement && (document.documentElement.scrollLeft || document.documentElement.scrollTop)) { // ie6
              top = document.documentElement.scrollTop, left = document.documentElement.scrollLeft;
          }
    // store the scroll
          if (top || left) window.name = prefix + '_' + left + '_' + top + '_' + pre_name;
          return true;
      }
    }
</script>
