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

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('images/favicon.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/youmann.jpg') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/youmann.jpg') }}">
        <style>
          #reviewStars-input input:checked ~ label, #reviewStars-input label, #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
          background: url('http://positivecrash.com/wp-content/uploads/ico-s71a7fdede6.png') no-repeat;
        }
        
        #reviewStars-input {
          
          /*fix floating problems*/
          overflow: hidden;
          *zoom: 1;
          /*end of fix floating problems*/
          
          position: relative;
          float: left;
        }
        
        #reviewStars-input input {
          filter: progid:DXImageTransform.Microsoft.Alpha(Opacity=0);
          opacity: 0;
          
          width: 43px;
          height: 40px;
          
          position: absolute;
          top: 0;
          z-index: 0;
        }
        
        #reviewStars-input input:checked ~ label {
          background-position: 0 -40px;
          height: 40px;
          width: 43px;
        }
        
        #reviewStars-input label {
          background-position: 0 0;
          height: 40px;
          width: 43px;
          float: right;
          cursor: pointer;
          margin-right: 10px;
          
          position: relative;
          z-index: 1;
        }
        
        #reviewStars-input label:hover, #reviewStars-input label:hover ~ label {
          background-position: 0 -40px;
          height: 40px;
          width: 43px;
        }
        
        #reviewStars-input #star-0 {
          left: 0px;
        }
        #reviewStars-input #star-1 {
          left: 53px;
        }
        #reviewStars-input #star-2 {
          left: 106px;
        }
        #reviewStars-input #star-3 {
          left: 159px;
        }
        #reviewStars-input #star-4 {
          left: 212px;
        }
        #reviewStars-input #star-5 {
          left: 265px;
        }
        </style>
    </head>
    <body>

  @include('shared.navbar2')
  @yield('content')
  <!-- Footer -->
  <footer class="footer-bg">
      <div class="footer-top border-bottom section-padding-top padding-bottom-40">
        <div class="container">
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
    <script src="{{ asset('js/upload-input.js') }}"></script>


    <script src="{{ asset('js/custom.js') }}"></script>

   
    </body>
</html>