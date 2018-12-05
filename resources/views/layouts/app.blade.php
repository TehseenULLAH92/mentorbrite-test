<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name', 'MentorBrite') }}</title>
  <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
  <link rel="dns-prefetch" href="//fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
  <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/jquery.selectBox.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/dropzone.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/rangeslider.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/leaflet.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/map.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/jquery.mCustomScrollbar.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/css/font-awesome.min.css') }}">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
  <link rel="shortcut icon" href="'{{ asset('assets/img/favicon.ico') }}" type="image/x-icon" >
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPoppins:400,500,700,800,900%7CRoboto:100,300,400,400i,500,700">
  <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('assets/css/skins/default.css') }}">
</head>
<body>
  <div id="app">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
          {{ config('app.name', 'MentorBrite') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
          </ul>
          <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/restaurants') }}">{{ __('Restaurants') }}</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            <li class="nav-item">
              @if (Route::has('register'))
              <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
              @endif
            </li>
            @else
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>
  <main class="py-4">
    @yield('content')
  </main>
</div>
<script src="{{ asset('assets/js/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.selectBox.js') }}"></script>
<script src="{{ asset('assets/js/rangeslider.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.filterizr.js') }}"></script>
<script src="{{ asset('assets/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/js/backstretch.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollUp.js') }}"></script>
<script src="{{ asset('assets/js/particles.min.js') }}"></script>
<script src="{{ asset('assets/js/typed.min.js') }}"></script>
<script src="{{ asset('assets/js/dropzone.js') }}"></script>
<script src="{{ asset('assets/js/jquery.mb.YTPlayer.js') }}"></script>
<script src="{{ asset('assets/js/leaflet.js') }}"></script>
<script src="{{ asset('assets/js/leaflet-providers.js') }}"></script>
<script src="{{ asset('assets/js/leaflet.markercluster.js') }}"></script>
<!-- <script src="{{ asset('assets/js/maps.js') }}"></script> -->
<script src="{{ asset('assets/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0N5pbJN10Y1oYFRd0MJ_v2g8W2QT74JE"></script>
<script src="{{ asset('assets/js/ie-emulation-modes-warning.js') }}"></script>
<script type="text/javascript">
function LoadMap(propertes) {
  var defaultLat = 40.7110411;
  var defaultLng = -74.0110326;
  var mapOptions = {
    center: new google.maps.LatLng(defaultLat, defaultLng),
    zoom: 15,
    scrollwheel: true,
    styles: [
      {
        featureType: "administrative",
        elementType: "labels",
        stylers: [
          {visibility: "off"}
        ]
      },
      {
        featureType: "water",
        elementType: "labels",
        stylers: [
          {visibility: "off"}
        ]
      },
      {
        featureType: 'poi.business',
        stylers: [{visibility: 'off'}]
      },
      {
        featureType: 'transit',
        elementType: 'labels.icon',
        stylers: [{visibility: 'off'}]
      },
    ]
  };
  var infoWindow = new google.maps.InfoWindow();
  var myLatlng = new google.maps.LatLng(40.7110411, -74.0110326);

  var marker = new google.maps.Marker({
    position: myLatlng,
    map: map
  });
}
(function ($) {
  $(window).on('resize', function () {
    $('#map').css('height', $(this).height() - 110);
    if ($(this).width() > 768) {
      $(".map-content-sidebar").mCustomScrollbar(
        {theme: "minimal-dark"}
      );
      $('.map-content-sidebar').css('height', $(this).height() - 110);
    } else {
      $('.map-content-sidebar').mCustomScrollbar("destroy"); //destroy scrollbar
      $('.map-content-sidebar').css('height', '100%');
    }
  }).trigger("resize");
})(jQuery);
function doAnimations(elems) {
  var animEndEv = 'webkitAnimationEnd animationend';
  elems.each(function () {
    var $this = $(this),
    $animationType = $this.data('animation');
    $this.addClass($animationType).one(animEndEv, function () {
      $this.removeClass($animationType);
    });
  });
}
var latitude = 40.740382;//51.541216;
var longitude = -73.991165;//-0.095678;
var providerName = 'Hydda.Full';
generateMap(latitude, longitude, providerName);
</script>
</body>
</html>
