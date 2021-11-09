<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNL Solutions</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{ url('css/indexStyles.css') }}">

    <link rel="shortcut icon" href="{{ url('images/TNLLOGO.png') }}">
    <link rel="stylesheet" href="{{ url('css/gallery.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css" integrity="sha512-nNlU0WK2QfKsuEmdcTwkeh+lhGs6uyOxuUs+n+0oXSYDok5qy0EI0lt01ZynHq6+p/tbgpZ7P+yUb+r71wqdXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="{{ url('/') }}" class="logo"><span style="font-weight: bold;">TRANOULGA</span> Solutions</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="{{ url('/') }}">home</a>
        <a href="{{ url('/contact/page/us') }}">contact</a>
        <a href="{{ url('/gallery') }}">Gallery</a>

        @if (session()->has('LoggedUser'))
        @if (session('isAdmin') == 1)
        <a href="{{ url('/admin/profile') }}"><button class="btn">Profile</button></a>
        <a href="{{ url('/logout') }}"><button class="btn">Logout</button></a>
        

        @else
        <a href="{{ url('moderator/profile') }}"><button class="btn">Profile</button></a>
        <a href="{{ url('/logout') }}"><button class="btn">Logout</button></a>

        @endif
        @else
        <a href="{{ url('/login') }}"><button class="btn">login</button></a>

        @endif
    </nav>

</header>

<!-- spacer start -->

<div class="spacer"></div>


<div class="headlineTitle">
    <h1>Gallery</h1>
</div>
<main class="main">
    <div class="container">
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_4721.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_4721.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_4725.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_4725.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_4733.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_4733.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6352.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6352.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6398.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6398.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6406.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6406.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6422.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6422.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6429.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6429.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
      <div class="card">
        <div class="card-image">
          <a href="{{ url('galleryImages/IMG_6453.JPG') }}" data-fancybox="gallery" data-caption="Caption Images 1">
            <img src="{{ url('galleryImages/IMG_6453.JPG') }}" alt="Image Gallery">
          </a>
        </div>
      </div>
    </div>
  </main>


<!-- footer section starts  -->
<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p> TRANOULGA SARL AU et une
                Société spécialisée en Systèmes et réseaux
                Informatiques et télécommunication.</p>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="{{ url('/') }}">home</a>
            <a href="{{ url('/contact/page/us') }}">contact</a>
            <a href="{{ url('/gallery') }}">Gallery</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">Linkedin</a>
            <a href="#">twitter</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <div class="info">
                <i class="fas fa-phone"></i>
                <p>+212 61 70 58 75 </p>
            </div>
            <div class="info">
                <i class="fas fa-envelope"></i>
                <p> Tranaulgasarlau@Gmail.Com </p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p> 213 Rue Lakmiss Qu industriel - Safi</p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright @ 2021 by TRANOULGA SARL AU </h1>

</div>
<!-- footer section ends -->
<script src="{{ url('js/gallery.js') }}"></script>


<script>
    // Fancybox Configuration
$('[data-fancybox="gallery"]').fancybox({
buttons: [
"slideShow",
"thumbs",
"zoom",
"fullScreen",
"share",
"close"
],
loop: false,
protect: true
});

</script>

</body>
</html>