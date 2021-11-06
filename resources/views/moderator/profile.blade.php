@include('moderator.ModeratorLayout')


<head>
    <link rel="stylesheet" href="{{ url('css/moderatorProfile.css') }}">
</head>
            <div class="container">
                <h2>Your personal informations <small>welcome back</small></h2>
                <ul class="responsive-table">
                  <li class="table-header">
                    <div class="col col-1">image</div>
                    <div class="col col-2">Username</div>
                    <div class="col col-3">Email</div>
                    <div class="col col-4">Password</div>
                    <div class="col col-5">Phone</div>
                    <div class="col col-6">Action</div>
                    
                  </li>
                  <li class="table-row">
                    <div class="col col-1 avatar" data-label="image"><img src="{{ url('uploads/images/'.$loggedUserInfo->image) }}" alt=""></div>
                    <div class="col col-2" data-label="Username">{{ $loggedUserInfo->userName }}</div>
                    <div class="col col-3" data-label="Email">{{ $loggedUserInfo->email }}</div>
                    <div class="col col-4" data-label="Password">{{ $loggedUserInfo->password }}</div>
                    <div class="col col-5" data-label="Phone">{{ $loggedUserInfo->phone }}</div>
                    <div class="col col-6" data-label="Action"><a href="{{ url('moderator/update') }}" class="btn">Update</a></div>
                  </li>
                 
                  
                </ul>
              </div>
        </div>
    </div>

    
 
    <script src="{{ url('js/adminProfile.js') }}"></script>
 
</body>
</html>