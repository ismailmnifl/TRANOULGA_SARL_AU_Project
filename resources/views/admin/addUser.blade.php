@include('admin.AdminLayout')
<head>
    <link rel="stylesheet" href="{{ url('css/AddNewUser.css') }}">

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

            <h2>Add new team member</h2>
            <div class="updateSection">
                <div class="cardWrapper">
                    <div class="cardheader">
                        <p>View all team members : </p>
                        <a href="{{ url('Admin/team') }}" class="btn">View</a>
                    </div>
                    <div class="container">
                        <div class="wrapper">
                            @if (Session::has('message'))
                                <div class="message">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form action="{{ route('insert.user') }}" method="post" enctype="multipart/form-data">
                                @csrf   
                                <div class="inputBox">
                                    <label>Role</label>
                                    <select name="role"  value="{{ old('role') }}">
                                        
                                        @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role }}</option>
                                        @endforeach
                                        
                                    </select>
                                </div>           
                                <div class="inputBox">
                                    <label id="custom-file-upload" for="file-upload" class="custom-file-upload">
                                        upload image
                                    </label>
                                    <input style="display: none" id="file-upload" name="image" type="file"/>

                                    <span class="errorMessage">@error('image')
                                        {{ $message }}
                                    @enderror</span>
                                </div>      
                                <div class="inputBox">
                                    <label>Username</label>
                                    <input type="text" name="username" value="{{ old('username') }}">

                                    <span class="errorMessage">@error('username')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Email</label>
                                    <input type="text" name="email"  value="{{ old('email') }}">

                                    <span class="errorMessage">@error('email')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Password</label>
                                    <input type="password" name="password"  value="{{ old('password') }}">

                                    <span class="errorMessage">@error('password')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                                <div class="inputBox">
                                    <label>Phone</label>
                                    <input type="text" name="phone"  value="{{ old('phone') }}">

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