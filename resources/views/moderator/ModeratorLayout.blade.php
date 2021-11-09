<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TNL Solutions</title>
    <link rel="stylesheet" href="{{ url('css/moderatorLayoutStyles.css') }}">
    <!-- Box Icons -->

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />

  <link rel="shortcut icon" href="{{ url('images/TNLLOGO.png') }}">

</head>
<body>
    <div class="main">
        <div class="side-navbar">
            <ul>
                <li><a href="{{ url('/') }}">
                    <span class="icon"><i class='fab fa-connectdevelop'></i></span>
                    <span class="text"><h3>TNL Soluions</h3></span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class='fas fa-home' ></i></span>
                    <span class="text">Home</span>
                </a></li>

                <li><a href="{{ url('moderator/profile') }}">
                    <span class="icon"><i class='fas fa-user' ></i></span>
                    <span class="text">Profile</span>
                </a></li>

                <li><a href="{{ url('moderator/mission') }}">
                    <span class="icon"><i class='fas fa-briefcase' ></i></span>
                    <span class="text">Missions</span>
                </a></li>
               
                
                <li><a href="{{ url('moderator/mission/notification') }}">
                    <span class="icon"><i class='fas fa-wifi' ></i></span>
                    <span class="text">Sites</span>
                </a></li>
                <li><a href="#">
                    <span class="icon"><i class='fas fa-cog' ></i></span>
                    <span class="text">Setting</span>
                </a></li>
                <li><a href="{{ route('logout') }}">
                    <span class="icon"><i class='fas
                        fa-sign-out-alt fa-flip-horizontal' ></i></span>
                    <span class="text">Log-Out</span>
                </a></li>
            </ul>
        </div>
        <div class="content">
            <div class="top-navbar">
                <div class="fas fa-bars" id="menu-icon"></div>
                <div class="profile">

                    @if(Session::has('notify'))
                    <div class="notyContainer">
                        
                        <p>{{ nl2br(Session::get('notify')) }}</p> 
                            <div id="noty" class="fas fa-bell" id="menu-icon"></div>
                    </div>
                           
                    @endif
                        

                    
                    <img src="{{ url('images/avatar.png') }}" alt="">
                </div>
            </div>

            <script src="{{ url('js/adminProfile.js') }}"></script>
