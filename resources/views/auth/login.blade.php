<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ url('css/loginStyles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <title>Login</title>
</head>
<body>

    
<header>

    <a href="{{ url('/') }}" class="logo"><span style="font-weight: bold;">TNL</span> Solutions</a>

    <input type="checkbox" id="menu-bar">
    <label for="menu-bar" class="fas fa-bars"></label>

            <nav class="navbar">
                <a href="{{ url('/') }}"><button class="btn">Home</button></a>
            </nav>

</header>

    <div class="container">
        <div class="wrapper">

            <form action="{{ route('auth.check') }}" method="post">
                @csrf
              
                <h1 class="heading">Login</h1>

                <div class="results">
                    @if (Session::get('fail'))
                        <div class="wrong">
                            {{ Session::get('fail') }}
                        </div>
                    @endif
                </div>
                <div class="inputBox">
                    <input type="text" name="username" value="{{ old('username') }}">
                    <label>Username</label>

                    <span class="errorMessage">@error('username')
                        {{ $message }}
                    @enderror</span>
                </div>
        
                <div class="inputBox">
                    <input type="password" name="password">
                    <label>Password</label>
                    <span class="errorMessage">@error('password')
                        {{ $message }}
                    @enderror</span>
                </div>

               <button type="submit" class="btn">Submit</button>

                <div class="resetPass">
                    <a href="#"><p>Did you forget your password !</p></a>
                </div>
                </form>
        </div>
    </div>
</body>
</html>