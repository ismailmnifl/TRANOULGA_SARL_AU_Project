@include('moderator.ModeratorLayout')



<head>
    <link rel="stylesheet" href="{{ url('css/updateModerator.css') }}">
    <style>
        #custom-file-upload {
            border:2px dashed var(--main);
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            width: 100%;
            text-align: center;
            font-weight: 500;
            border-radius: 5px;
            margin-top: 5px;
            margin-bottom: 5px;
        }
    </style>
</head>

            <h2>Update info</h2>
            <div class="updateSection">
                <div class="cardWrapper">
                    <div class="cardheader">
                        <p>View your informations : </p>
                        <a href="{{ url('/moderator/profile') }}" class="btn">View</a>
                    </div>
                    <div class="container">
                        <div class="wrapper">

                            @if (Session::has('message'))
                            <div class="message">
                                {{ Session::get('message') }}
                            </div>
                        @endif

                            <form action="{{ route('moderator.update') }}" method="post" enctype="multipart/form-data">
                                @csrf         
                                <input type="hidden" name="user_id" value="{{ $loggedUserInfo->user_id }}">
                                <input type="hidden" name="avatar" value="{{ $loggedUserInfo->image }}">
                                <div class="imageContainer">
                                    <div class="avatar">
                                        <img src="{{ url('uploads/images/'.$loggedUserInfo->image) }}" alt="">
                                    </div>
                                </div>
                            
                                <div class="inputBox">
                                    <label id="custom-file-upload" for="file-upload" class="custom-file-upload">
                                        upload file
                                    </label>
                                    <input style="display: none" id="file-upload" name="image" type="file"/>
        
                                    <span class="errorMessage">@error('image')
                                        {{ $message }}
                                    @enderror</span>
                                </div>
                                <div class="inputBox">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ $loggedUserInfo->userName }}">

                                    <span class="errorMessage">@error('username')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Email</label>
                                    <input type="text" name="email" value="{{ $loggedUserInfo->email }}">

                                    <span class="errorMessage">@error('email')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Password</label>
                                    <input type="text" name="password" value="{{ $loggedUserInfo->password }}">

                                    <span class="errorMessage">@error('password')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="{{ $loggedUserInfo->phone }}">

                                    <span class="errorMessage">@error('phone')
                                        {{ $message }}
                                    @enderror</span>
                                </div>
                                <button type="submit" class="btnReverse">Submit</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>

    
 
    <script src="{{ url('js/adminProfile.js') }}"></script>
 
</body>
</html>