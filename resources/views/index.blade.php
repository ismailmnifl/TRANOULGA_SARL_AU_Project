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

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><span style="font-weight: bold;">TNL</span> Solutions</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">servies</a>
        <a href="#about">about</a>
        <a href="#review">team</a>
        <a href="{{ url('/contact/page/us') }}">contact</a>

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

<!-- spacer end -->


<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>best network sevice <span>and maintenance</span></h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus suscipit porro nam libero natus error consequatur sed repudiandae eos quo?</p>
        <a href="#" class="btn">Read more</a>
    </div>

    <div class="image">
        <img src="{{ url('images/homeGlobe.png') }}" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> Our servies </h1>

    <div class="box-container phoneSlade">
        <div class="mySlides slid">
            <div class="bWrapper">
            <div class="box">
                <div class="imageHolder">

                <img src="{{ url('images/driveTest.svg') }}" alt="">
                </div>
                <h3>Network drive test</h3>
                <p>npfal ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                <a href="#" class="btn">read more</a>
            </div>
            </div>
        </div>
        <div class="mySlides slid">
            <div class="bWrapper">
                <div class="box">
                    <div class="imageHolder">

                    <img src=" {{ url('images/repaire.svg') }}" alt="">
                    </div>
                    <h3>Repair and upkeep network</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
        </div>
        <div class="mySlides slid">
            <div class="bWraper">
                <div class="box">
                    <div class="imageHolder">

                    <img src=" {{ url('images/goodWork.svg') }}" alt="">
                    </div>
                    <h3>Reliable And serious Work Ethics</h3>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
        </div>
        <div class="mySlides slid">
            <div class="bWrapper">
                <div class="box">
                    <div class="imageHolder">

                    <img src="{{ url('images/security.svg') }}" alt="">
                    </div>
                    <h3>Network drive test</h3>
                    <p>npfal ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                    <a href="#" class="btn">read more</a>
                </div>
            </div>
        </div>
        <div class="mySlides slid">
                <div class="bWrapper">
                    <div class="box">
                        <div class="imageHolder">

                        <img src=" {{ url('images/equipment.svg') }}" alt="">
                        </div>
                        <h3>Repair and upkeep network</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>
        </div>
        <div class="mySlides slid">
                <div class="bWraper">
                    <div class="box">
                        <div class="imageHolder">
                        <img src=" {{ url('images/course.svg') }}" alt="">
                    </div>
                        <h3>Reliable And serious Work Ethics</h3>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam minus recusandae autem, repellendus fugit quaerat provident voluptatum non officiis ratione.</p>
                        <a href="#" class="btn">read more</a>
                    </div>
                </div>
        </div>
        
        

        <div class="naviGroup">
            <button class="display-left navi" onclick="plusDivs(-1)">&#10094;</button>
            <button class="display-right navi" onclick="plusDivs(1)">&#10095;</button>    
        </div>



    </div>

    <script>
        var slideIndex = 1;
        showDivs(slideIndex);
      
        function plusDivs(n) {
          showDivs(slideIndex += n);
        }
      
        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }

        var slideIndex = 1;
        showDivsDesktop(slideIndex);
      
        function plusDivsDesktop(n) {
          showDivsDesktop(slideIndex += n);
        }
      
        function showDivsDesktop(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length}
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";  
          }
          x[slideIndex-1].style.display = "block";  
        }
       
        </script>
      
</section>

<!-- features section ends -->

<!-- about section starts  -->

<section class="about" id="about">

    <h1 class="heading"> About US </h1>

    <div class="column">

        <div class="image">
            <img src=" {{ url('images/About us.svg') }}" alt="">
        </div>

        <div class="content">
            <h3>Increase competitive advantages over companies in the same market</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nulla placeat deserunt saepe repudiandae veniam soluta minima dolor hic aperiam iure.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, quaerat. Dolorem ratione saepe magni quo inventore porro ab voluptates eos, nam eius provident accusantium, quia similique est, repellendus et reiciendis.</p>
            <div class="buttons">
                <a href="#" class="btn"> <i class="fas fa-sign-in-alt"></i></i> Join us </a>
                <a href="#" class="btn"> <i class="fas fa-rss-square"></i></i> Follow us </a>
            </div>
        </div>

    </div>

</section>

<!-- about section ends -->

<!-- newsletter  -->

<div class="newsletter">

    <h3>Subscribe For New and updates</h3>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus sed aliquam quibusdam neque magni magnam est laborum doloribus, facere dolores.</p>
    <form action="">
        <input type="email" placeholder="enter your email">
        <input type="submit" value="Subscribe">
    </form>

</div>

<!-- review section starts  -->

<section style="margin-bottom: -100px" class="review" id="review">

    <h1 class="heading"> Our team leaders </h1>

    <div class="box-container">

        <div class="box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
                <img src=" {{ url('images/avatar.png') }}" alt="">
                <h3>Nawfal Lougdali</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
                <img src=" {{ url('images/avatar.png') }}" alt="">
                <h3>Badr Elachay</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

        <div class="box">
            <i class="fas fa-quote-right"></i>
            <div class="user">
                <img src=" {{ url('images/avatar.png') }}" alt="">
                <h3>john deo</h3>
                <div class="stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </div>
                <div class="comment">
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Possimus et, perspiciatis nisi tempore aspernatur accusantium sed distinctio facilis aperiam laborum autem earum repellat, commodi eum. Ullam cupiditate expedita officiis obcaecati?
                </div>
            </div>
        </div>

    </div>

</section>

<!-- review section ends -->

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