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

</head>
<body>
    
<!-- header section starts  -->

<header>

    <a href="#" class="logo"><span style="font-weight: bold;">TRANOULGA</span> Solutions</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

    <nav class="navbar">
        <a href="#home">home</a>
        <a href="#features">servies</a>
        <a href="#about">about</a>
        <a href="#review">team</a>
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

<!-- spacer end -->


<!-- header section ends -->

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <h3>Société spécialisée en Systèmes 
            <span>et réseaux
                Informatiques et télécommunication</span></h3>
        <p>Nous travaillons à faire de notre passion pour les Systèmes et réseaux Informatiques et télécommunications une réalité. Nous espérons que vous apprécierez nos services autant que nous aimons vous les offrir.</p>
        <a href="#about" class="btn">Read more</a>
    </div>

    <div class="image">
        <img src="{{ url('images/homeGlobe.png') }}" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- features section starts  -->

<section class="features" id="features">

    <h1 class="heading"> Nos Services </h1>

    <div class="box-container phoneSlade">

        @foreach ($services as $service)
        <div class="mySlides slid">
            <div class="bWrapper">
            <div class="box">
                <div class="imageHolder">

                <img src="{{ url('uploads/images/'.$service->image) }}" alt="">
                </div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
                <a href="#" class="btn">read more</a>
            </div>
            </div>
        </div>
        @endforeach      
        
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

    <h1 class="heading"> À PROPOS DE NOUS </h1>

    <div class="column">

        <div class="image">
            <img src=" {{ url('images/About us.svg') }}" alt="">
        </div>

        <div class="content">
            <h3>Augmenter les avantages concurrentiels par rapport aux entreprises du même marché</h3>
            <p>
                Bienvenue chez TRANOUGA SARL AU, votre source numéro un pour tout ce qui concerne l'installation
                et la maintenance des systèmes et réseaux Informatiques et télécommunications. Nous nous engageons
                à vous fournir le meilleur de notre industrie, en mettant l'accent sur une qualité supérieure
                et une bonne éthique de travail.

                Fondée en 2019 par Nawfal LOUGDALI, TRANOUGA SARL AU a parcouru un long chemin depuis ses débuts à safi.
                Lorsque Nawfal a commencé, sa passion pour la qualité premium et l'éthique de travail supérieure les
                ont poussés à créer leur propre entreprise.

                Nous espérons que vous apprécierez nos services autant que nous aimons vous les offrir.
                Si vous avez des questions ou des commentaires, n'hésitez pas à nous contacter.

                
            </p>
            <p>Sincèrement,</p>
<p>Nawfal LOUGDALI</p>
           
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

    <h3>ABONNEZ-VOUS POUR LES NOUVEAUX ET MISES À JOUR</h3>
    <p>nous considérons que votre e-mail est considéré comme une information sensible et ne sera partagé avec aucune autre source</p>
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
                <img src=" {{ url('images/bdr.jpg') }}" alt="">
                <h3>Badr Elachaq</h3>
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
                <img src=" {{ url('images/linkedinBIG.png') }}" alt="">
                <h3>Ismail Mnifil</h3>
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
            <p> TRANOULGA SARL AU et une
                Société spécialisée en Systèmes et réseaux
                Informatiques et télécommunication.</p>
        </div>

        <div class="box">
            <h3>quick links</h3>
            <a href="#home">home</a>
            <a href="#features">servies</a>
            <a href="#about">about</a>
            <a href="#review">team</a>
            <a href="{{ url('/contact/page/us') }}">contact</a>
        </div>

        <div class="box">
            <h3>follow us</h3>
            <a href="https://www.facebook.com/Tranoulga-SARL-AU-100755799097056">facebook</a>
            <a href="#">instagram</a>
            <a href="https://www.linkedin.com/company/tranoulga-sarl-au/">Linkedin</a>
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
                <p> tranaulgasarlau@gmail.com </p>
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


</body>
</html>