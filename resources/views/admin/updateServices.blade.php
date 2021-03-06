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

            <h2>Mise a jour du service : {{ $services->title }}</h2>
            <div class="updateSection">
                <div class="cardWrapper">
                    <div class="cardheader">
                        <p>View all team members : </p>
                        <a href="{{ url('/admin/services') }}" class="btn">View</a>
                    </div>
                    <div class="container">
                        <div class="wrapper">
                            @if (Session::has('message'))
                                <div class="message">
                                    {{ Session::get('message') }}
                                </div>
                            @endif
                            <form action="{{ route('edit.service') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="servie_id" value="{{ $services->servie_id }}">
                                <input type="hidden" name="avatar" value="{{ $services->image }}">


                                <div class="imageContainer">
                                    <div class="avatar">
                                        <img src="{{ url('uploads/images/'.$services->image) }}" alt="">
                                    </div>
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
                                    <label>Titre</label>
                                    <input type="text" name="title" value="{{ $services->title }}">

                                    <span class="errorMessage">@error('title')
                                        {{ $message }}
                                    @enderror</span>
                                </div>
                                <div class="inputBox">
                                    <label>Description</label>
                                    <textarea placeholder="Entr?? la d??scription du service " style="width: 100%" name="description" id=""  rows="3" >{{ $services->description }}</textarea>
            
                                    <span class="errorMessage">@error('description')
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