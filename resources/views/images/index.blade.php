<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Images</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('libs/slick/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('libs/slick/slick-theme.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="slider_body">
  <h3>click on the <a href="{{ route('orders') }}">link</a> to order tickets</h3>

<div class="main slider_main">
  @if (count($images) > 0)   
    <div class="sl">
      @foreach($images as $image)
        <div class="sl__slide">
          <img src="{{ asset('images/' . $image->name) }}" class="sl__img">
          <div class="sl__text">
            <h3 class="sl__title">title</h3>
            <p class="sl_desc">description</p>
        </div>
      </div>
      @endforeach
    </div>
  @else
    <h2>Upload images in admin panel to activate slider</h2>  
  @endif
</div>
  

  <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="{{ asset('libs/slick/slick.js') }}"></script>
  <script src="{{ asset('js/app.js') }}"></script>

</body>