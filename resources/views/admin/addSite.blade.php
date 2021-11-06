@include('admin.AdminLayout')
<head>
    <link rel="stylesheet" href="{{ url('css/addSiteStyle.css') }}">


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
<h2>Ajouter un nouveau site</h2>
<div class="updateSection">
    <div class="cardWrapper">
        <div class="cardheader">
            <p>Voir touts les sites :</p>
            <a href="{{ url('/admin/sites') }}" class="btn">View</a>
        </div>
        <div class="fullContentWrapper">
        <div class="container">
            <div class="wrapper">
                @if (Session::has('message'))
                    <div class="message">
                        {{ Session::get('message') }}
                    </div>
                @endif
                
                <form action="{{ route('site.add.sector') }}" method="post">  
                    @csrf  
                    <fieldset class="feild">
                    <legend> Informations du site </legend>
                    <div class="inputBox">
                        <label>Name</label>
                        <input placeholder="Entrée le nome du site" type="text" name="name" value="{{ old('name') }}">

                        <span class="errorMessage">@error('name')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="inputBox">
                        <label>Mode</label>
                        <select onchange="selectedMode()" id="mode" name="mode">
                            <option value="ConfigurationReduite">Configuration Reduite</option>
                            <option value="horsConfigurationReduite">hors Configuration Reduite</option>
                        </select>
                    </div>        
                         
                    <div class="inputBox">
                        <label>Latitude</label>
                        <input type="text" placeholder="Entrée latitude du site" name="latitude" value="{{ old('latitude') }}">

                        <span class="errorMessage">@error('latitude')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>longitude</label>
                        <input type="text" name="longitude" placeholder="Entrée longitude du site" value="{{ old('longitude') }}">

                        <span class="errorMessage">@error('longitude')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Height</label>
                        <input type="text" name="height" placeholder="Entrée le height du site" value="{{ old('height') }}">

                        <span class="errorMessage">@error('height')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Client</label>
                        <input type="text" name="client" placeholder="Entrée le client du site" value="{{ old('client') }}">

                        <span class="errorMessage">@error('client')
                            {{ $message }}
                        @enderror</span>
                    </div>
                     <button type="submit" class="btnReverse" >Submit</button>
                     <a style="float: right" href="{{ url('/admin/sector/page') }}" class="btnReverse">Next</a>
                </fieldset> 
                </form>
                
            </div>
        </div>
{{-- ************************************************************************************* --}}
        
    </div>
        
    </div>
</div>

</div>
</div>

<script src="{{ url('js/adminProfile.js') }}"></script>

</body>
</html>