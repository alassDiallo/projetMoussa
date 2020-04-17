<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.6">
  <title>{{ $titre }}</title>
    <!-- Bootstrap core CSS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('js')

  <link  rel="stylesheet" href="{{ asset('css/css.css') }}">
  <link  rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.4/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.4/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.4/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.4/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
  </head>
  <body>
    <div class="container">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 text-center">
      <a class="blog-header-logo text-dark" href="{{ route('produits.index') }}"><h5>SUNU SUPER<h5></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        @include('layouts.partials._partial')
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2 bg-dark text-center" >
    <nav class="nav d-flex justify-content-between">
        @foreach (App\Models\Categorie::all() as $categorie)
    <a class="p-2 " style="color:white;"  href="{{ route('produits.index',['categorie'=>$categorie->slug]) }}"> {{ $categorie->nom   }}</a>
        @endforeach
    </nav>
  </div>
  @if(session('message'))
  <div class="alert alert-success">
      {{ session('message') }}
  </div>
  @endif
  @if(session()->has('notification.message'))
  <div class="alert alert-{{ session('notification.type') }} col-lg-12 text-center mt-4 mb-4">
          {!! session()->get('notification.message') !!}
       </div>
       @endif
 <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ asset('/img/img2.jpg') }}" class="d-block w-100" style="height: 300px" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('/img/img2.jpg') }}" class="d-block w-100" style="height: 300px"alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img style="height: 300px;" src="{{ asset('/img/img.jpg') }}" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@if(request()->recherche)
<h2 class="mt-4">{{ $produits->total() }} {{ Str::plural('resultat',$produits->count()) }}  trouvé pour le produits "{{  request()->recherche  }}"</h2>
@endIf
  <div class="row mb-2 mt-2">
    @yield('content')
</div>
    </div>
    <div class="text-center">
<footer class="blog-footer">
  <p>Blog template built for <a href="https://getbootstrap.com/">Bootstrap</a> by <a href="https://twitter.com/mdo">@mdo</a>.</p>
  <p>
    <a href="#">Back to top</a>
  </p>
</footer>
</div>
</body>
</html>
@yield('extra-js')
</body>
</html>
