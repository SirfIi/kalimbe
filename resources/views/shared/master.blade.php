<html>
    <head>
        <title> @yield('title') </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

        <!-- External Css -->
        <link rel="stylesheet" href="{{ asset('css/fontawesome-all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/et-line.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/plyr.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/flag.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/slick.css') }}" /> 
        <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('css/jquery.nstSlider.min.css') }}" />

        <!-- Custom Css -->
         <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
         <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,600%7CRoboto:300i,400,500" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/youmann.jpg') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/youmann.jpg') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/youmann.jpg') }}">

        <style>
          /* Rating Star Widgets Style */
.rating-stars ul {
  list-style-type:none;
  padding:0;
  
  -moz-user-select:none;
  -webkit-user-select:none;
}
.rating-stars ul > li.star {
  display:inline-block;
  
}

/* Idle State of the stars */
.rating-stars ul > li.star > i.fa {
  font-size:2.5em; /* Change the size of the stars */
  color:#ccc; /* Color on idle state */
}

/* Hover state of the stars */
.rating-stars ul > li.star.hover > i.fa {
  color:#FFCC36;
}

/* Selected state of the stars */
.rating-stars ul > li.star.selected > i.fa {
  color:#FF912C;
}

        </style>

    </head>
    <body>

  @include('shared.navbar')
  @yield('content')
  <!-- Footer -->
  <footer class="footer-bg">
      <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <div class="footer-logo">
                <a href="#">
                  <img src="{{ asset('images/youmann - 2.jpg') }}" class="img-fluid" alt="">
                </a>
              </div>
            </div>
            <div class="col-md-4 col-lg-4 offset-lg-1 col-sm-4">
              <div class="footer-widget footer-shortcut-link">
                <h4>Termes &amp; Conditions</h4>
                <div class="widget-inner">
                  <ul>
                    <li><a href="{{url('conditions/candidats')}}">Candidats</a></li>
                    <li><a href="{{url('conditions/recruteurs')}}">Recruteurs</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom-area">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="footer-bottom border-top">
                <div class="row">
                  <div class="col-xl-4 col-lg-5 order-lg-2">
                  </div>
                  <div class="col-xl-4 col-lg-4 order-lg-1">
                    <p class="copyright-text">Copyright <a href="#">Youmann Job</a> 2019, All right reserved</p>
                  </div>
                  <div class="col-xl-4 col-lg-3 order-lg-3">
                    <div class="back-to-top">
                      <a href="#">Haut de Page<i class="fas fa-angle-up"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Footer End -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/feather.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/jquery.nstSlider.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/visible.js') }}"></script>
    <script src="{{ asset('js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/chart.js') }}"></script>
    <script src="{{ asset('js/plyr.js') }}"></script>
    <script src="{{ asset('js/tinymce.min.js') }}"></script>
    <script src="{{ asset('js/slick.min.js') }}"></script>
    <script src="{{ asset('js/jquery.ajaxchimp.min.js') }}"></script>

    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/datePicker.js') }}"></script>
    <!-- <script src="{{ asset('js/upload-input.js') }}"></script> -->


    <script src="{{ asset('js/custom.js') }}"></script>
    </body>
</html>