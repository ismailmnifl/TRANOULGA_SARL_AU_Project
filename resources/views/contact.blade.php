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



    <style>
    .mapouter
        {
        position:relative;
        text-align:right;
        height:100%;
        width:100%;
        box-shadow: 0 0.5rem 1rem rgb(0 0 0 / 10%);
        border: 0.1rem solid rgba(0,0,0,.2);
        border-radius: 0.5rem;
        }
    .gmap_canvas {
        overflow:hidden;
        height:100%;
        width:100%;
        }
    </style>

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><span style="font-weight: bold;">TNL</span> Solutions</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="{{ url('/') }}">home</a>
        <a href="#features">servies</a>
        <a href="#about">about</a>
        <a href="#review">team</a>
        <a href="#contact">contact</a>

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
    <h1>Contact US</h1>
</div>

<!-- spacer end -->


<!-- header section ends -->

<!-- contact section starts  -->

<section class="contact" id="contact">


    <div class="image">
        <img src=" {{ url('images/Contact us.svg') }}" alt="">
    </div>

    <form action="{{ route('admin.add.message') }}" method="POST">
        @csrf

        @if (Session::has('message'))
            <div class="message">
                {{ Session::get('message') }}
            </div>
        @endif

        <h1 class="heading">contact form</h1>

        <div class="inputBox">
            <input type="text" name="name">
            <label>name</label>
            <span class="errorMessage">@error('name')
                {{ $message }}
            @enderror</span>
        </div>

        <div class="inputBox">
            <input type="email" name="email">
            <label>email</label>
            <span class="errorMessage">@error('email')
                {{ $message }}
            @enderror</span>
        </div>

        <div class="inputBox">
            <input type="number" name="phone">
            <label>phone</label>
            <span class="errorMessage">@error('phone')
                {{ $message }}
            @enderror</span>
        </div>

        <div class="inputBox">
            <input type="text" name="subject">
            <label>Subject</label>
            <span class="errorMessage">@error('subject')
                {{ $message }}
            @enderror</span>
        </div>

        <div class="inputBox">
            <textarea name="message" id="" cols="30" rows="10"></textarea>
            <label>message</label>
            <span class="errorMessage">@error('message')
                {{ $message }}
            @enderror</span>
        </div>

       <a href="#contact"> <input type="submit" class="btn" value="send message"></a>

    </form>

</section >
<div class="informationSpacer">
    <h1 class="heading">Les information de l'organisme</h1>
</div>
{{-- iframe map start --}}
<section id="informationsAndMaps">
    <div class="iframeContainer">
        <div class="mapouter">
            <div class="gmap_canvas">
                <iframe width="100%" height="500" id="gmap_canvas"
                     src="https://maps.google.com/maps?q=32%C2%B017'05.8%22N%209%C2%B014'34.9%22W&t=&z=17&ie=UTF8&iwloc=&output=embed"
                     frameborder="0"
                      scrolling="no"
                      marginheight="0"
                      marginwidth="0">
                </iframe>
                <br>
            </div>
        </div>
    </div>
</section>
{{-- iframe map end --}}


<!-- contact section edns -->

<!-- footer section starts  -->

<div class="footer">

    <div class="box-container">

        <div class="box">
            <h3>about us</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet pariatur rerum consectetur architecto ad tempora blanditiis quo aliquid inventore a.</p>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#">home</a>
            <a href="#">features</a>
            <a href="#">about</a>
            <a href="#">review</a>
            <a href="#">pricing</a>
            <a href="#">contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="#">facebook</a>
            <a href="#">instagram</a>
            <a href="#">pinterest</a>
            <a href="#">twitter</a>
        </div>

        <div class="box">
            <h3>contact info</h3>
            <div class="info">
                <i class="fas fa-phone"></i>
                <p> +212 37 27 36 55  <br> +212 61 70 58 75 </p>
            </div>
            <div class="info">
                <i class="fas fa-envelope"></i>
                <p> tranaulgasarkau@gmail.com <br> ismailmnifilprogmail.com </p>
            </div>
            <div class="info">
                <i class="fas fa-map-marker-alt"></i>
                <p> 213 Rue Lakmiss Qu industriel - Safi</p>
            </div>
        </div>

    </div>

    <h1 class="credit"> &copy; copyright @ 2021 by TNL Solutions sarlau </h1>

</div>

<!-- footer section ends -->


</body>
</html>