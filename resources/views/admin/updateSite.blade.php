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
<h2>Métre ajour les information du site</h2>
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
                <form>
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
                            <option value="Configuration Reduite">Configuration Reduite</option>
                            <option value="hors Configuration Reduite">hors Configuration Reduite</option>
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
                    {{-- <button type="submit" class="btnReverse">Submit</button> --}}
                </fieldset> 
                </form>
            </div>
        </div>
{{-- ************************************************************************************* --}}
        <div class="container">
            <div class="wrapper">
                @if (Session::has('message'))
                    <div class="message">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <form>
                    @csrf  
                    <fieldset class="feild">
                    <legend> Informations des secteurs </legend> 
                    <div class="inputBox">
                        <label>Secteurs</label>
                        <select id="sector" name="sector">
                            <option value="secteur 1">Secteur 1</option>
                            <option value="secteur 2">Secteur 2</option>
                            <option value="secteur 3">Secteur 3</option>
                        </select>
                        <span class="errorMessage">@error('name')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="inputBox">
                        <label>Azimuth</label>
                        <input type="text" placeholder="Entrée l'azimuth du secteur" name="azimuth" value="{{ old('azimuth') }}">
                        
                        <span class="errorMessage">@error('azimuth')
                            {{ $message }}
                        @enderror</span>
                    </div>        
                         <fieldset class="feild">
                             <legend>Téchnologie 2G</legend>
                             <div class="inputBox">
                                <label>cell identification</label>
                                <input type="text" placeholder="Entrée cell identification" name="cell_identification" value="{{ old('cell_identification') }}">
        
                                <span class="errorMessage">@error('cell_identification')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>Channel number</label>
                                <input type="text" name="channel_number" placeholder="Entrée channel number" value="{{ old('channel_number') }}">
        
                                <span class="errorMessage">@error('channel_number')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (G900) </label>
                                <input type="text" name="frequence(G900)" placeholder="Entrée la frequence (G900)" value="{{ old('frequence(G900)') }}">
        
                                <span class="errorMessage">@error('frequence(G900)')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                         </fieldset>
                         <fieldset class="feild">
                            <legend>Téchnologie 3G</legend>
                            <div class="inputBox">
                               <label>cell identification</label>
                               <input type="text" placeholder="Entrée cell identification" name="cell_identification" value="{{ old('cell_identification') }}">
       
                               <span class="errorMessage">@error('cell_identification')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>Primary scrambling code</label>
                               <input type="text" name="primary_scrambling_code" placeholder="Entrée le Primary scrambling code" value="{{ old('primary_scrambling_code') }}">
       
                               <span class="errorMessage">@error('primary_scrambling_code')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>frequence (U900) </label>
                               <input type="text" name="frequence(U900)" placeholder="Entrée la frequence (G900)" value="{{ old('frequence(G900)') }}">
       
                               <span class="errorMessage">@error('frequence(U900)')
                                   {{ $message }}
                               @enderror</span>
                           </div>
                           <div id="tagToHide1" class="inputBox">
                            <label>frequence (U2100) </label>
                            <input type="text" name="frequence(U2100)" placeholder="Entrée la frequence (U2100)" value="{{ old('frequence(U2100)') }}">
    
                            <span class="errorMessage">@error('frequence(U2100)')
                                {{ $message }}
                            @enderror</span>
                        </div>

                        </fieldset>
                        <fieldset class="feild">
                             <legend>Téchnologie 4G</legend>
                             <div class="inputBox">
                                <label>Physical cell identity</label>
                                <input type="text" placeholder="Entrée cell identification" name="physical_cell_identity" value="{{ old('physical_cell_identity') }}">
        
                                <span class="errorMessage">@error(' physical_cell_identity')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (L800)</label>
                                <input type="text" name="frequence(L800)" placeholder="Entrée la frequence (L800)" value="{{ old('frequence(L800)') }}">
        
                                <span class="errorMessage">@error('frequence(L800)')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div id="tagToHide2" class="inputBox">
                                <label>requence (L1800)</label>
                                <input type="text" name="requence(L1800)" placeholder="Entrée la frequence (L1800)" value="{{ old('requence(L1800)') }}">
        
                                <span class="errorMessage">@error('requence(L1800)')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                         </fieldset>
                    {{-- <button class="btnReverse">Submit</button> --}}
                </fieldset> 
                </form>
            </div>
        </div>
    </div>
        
    </div>
</div>

</div>
</div>

<script>
    window.addEventListener("load", selectedMode);
    function removeSubmitedSector() {
        var x = document.getElementById("sector");
        x.remove(x.selectedIndex);
    }

    function selectedMode() {
        var y = document.getElementById('mode');
        if(y.value == 'Configuration Reduite') {

            document.getElementById("tagToHide1").style.display = "none";
            document.getElementById("tagToHide2").style.display = "none";
        }else {
            document.getElementById("tagToHide1").style.display = "block";
            document.getElementById("tagToHide2").style.display = "block";
        }
    }
</script>

<script src="{{ url('js/adminProfile.js') }}"></script>

</body>
</html>