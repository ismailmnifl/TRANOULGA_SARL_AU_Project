@include('admin.AdminLayout')

<head>
    <link rel="stylesheet" href="{{ url('css/addsector.css') }}">
    

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
            <p>Voir touts les sites : </p>
            <a href="{{ url('/admin/sites') }}" class="btn">View</a>
        </div>
    <div class="fullContentWrapper">
{{-- ************************************************************************************* --}}
@if (Session::has('message'))
                    <div class="message">
                        {{ Session::get('message') }}
                    </div>
                @endif
<form id="myform" action="{{ route('sector.add') }}" method="POST">
    @csrf
        <div class="container">
            <div class="wrapper">
                    
                    <fieldset class="feild">
                    <legend> Informations du secteur 1 </legend> 
                    <div class="inputBox">
                        <label>Azimuth</label>
                        <input type="text" placeholder="Entrée l'azimuth du secteur" name="azimuth1" value="{{ old('azimuth1') }}">
                        
                        <span class="errorMessage">@error('azimuth1')
                            {{ $message }}
                        @enderror</span>
                    </div>        
                         <fieldset class="feild">
                             <legend>Téchnologie 2G</legend>
                             <div class="inputBox">
                                <label>cell identification</label>
                                <input type="text" placeholder="Entrée cell identification" name="cell_identification1" value="{{ old('cell_identification1') }}">
        
                                <span class="errorMessage">@error('cell_identification1')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>Channel number</label>
                                <input type="text" name="channel_number1" placeholder="Entrée channel number" value="{{ old('channel_number1') }}">
        
                                <span class="errorMessage">@error('channel_number1')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (G900) </label>
                                <input type="text" name="frequence_G9001" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_G9001') }}">
        
                                <span class="errorMessage">@error('frequence_G9001')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                         </fieldset>
                         <fieldset class="feild">
                            <legend>Téchnologie 3G</legend>
                            <div class="inputBox">
                               <label>cell identification</label>
                               <input type="text" placeholder="Entrée cell identification" name="threeGcell_identification1" value="{{ old('threeGcell_identification1') }}">
       
                               <span class="errorMessage">@error('threeGcell_identification1')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>Primary scrambling code</label>
                               <input type="text" name="primary_scrambling_code1" placeholder="Entrée le Primary scrambling code" value="{{ old('primary_scrambling_code1') }}">
       
                               <span class="errorMessage">@error('primary_scrambling_code1')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>frequence (U900) </label>
                               <input type="text" name="frequence_U9001" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_U9001') }}">
       
                               <span class="errorMessage">@error('frequence_U9001')
                                   {{ $message }}
                               @enderror</span>
                           </div>
                           @if ($siteIbfos->mode != 'ConfigurationReduite')
                               
                            <div id="tagToHide1" class="inputBox">
                                <label>frequence (U2100) </label>
                                
                                    <input type="text" name="frequence_U21001" placeholder="Entrée la frequence (U2100)" value="{{ old('frequence_U21001') }}">
        
                                <span class="errorMessage">@error('frequence_U21001')
                                    {{ $message }}
                                @enderror</span>
                            </div>
                        
                           @endif
                          

                        </fieldset>
                        <fieldset class="feild">
                             <legend>Téchnologie 4G</legend>
                             <div class="inputBox">
                                <label>Physical cell identity</label>
                                <input type="text" placeholder="Entrée cell identification" name="physical_cell_identity1" value="{{ old('physical_cell_identity1') }}">
        
                                <span class="errorMessage">@error('physical_cell_identity1')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (L800)</label>
                                <input type="text" name="frequence_L8001" placeholder="Entrée la frequence (L800)" value="{{ old('frequence_L8001') }}">
        
                                <span class="errorMessage">@error('frequence_L8001')
                                    {{ $message }}
                                @enderror</span>
                            </div>
                            @if ($siteIbfos->mode != 'ConfigurationReduite')

                            <div id="tagToHide2" class="inputBox">
                                <label>requence (L1800)</label>
                                <input type="text" name="requence_L18001" placeholder="Entrée la frequence (L1800)" value="{{ old('requence_L18001') }}">
        
                                <span class="errorMessage">@error('requence_L18001')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                            @endif
                            

                         </fieldset>
                </fieldset> 
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                    
                    <fieldset class="feild">
                    <legend> Informations du secteur 2</legend>
                    <div class="inputBox">
                        <label>Azimuth</label>
                        <input type="text" placeholder="Entrée l'azimuth du secteur" name="azimuth2" value="{{ old('azimuth2') }}">
                        
                        <span class="errorMessage">@error('azimuth2')
                            {{ $message }}
                        @enderror</span>
                    </div>        
                         <fieldset class="feild">
                             <legend>Téchnologie 2G</legend>
                             <div class="inputBox">
                                <label>cell identification</label>
                                <input type="text" placeholder="Entrée cell identification" name="cell_identification2" value="{{ old('cell_identification2') }}">
        
                                <span class="errorMessage">@error('cell_identification2')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>Channel number</label>
                                <input type="text" name="channel_number2" placeholder="Entrée channel number" value="{{ old('channel_number2') }}">
        
                                <span class="errorMessage">@error('channel_number2')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (G900) </label>
                                <input type="text" name="frequence_G9002" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_G9002') }}">
        
                                <span class="errorMessage">@error('frequence_G9002')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                         </fieldset>
                         <fieldset class="feild">
                            <legend>Téchnologie 3G</legend>
                            <div class="inputBox">
                               <label>cell identification</label>
                               <input type="text" placeholder="Entrée cell identification" name="threeGcell_identification2" value="{{ old('threeGcell_identification2') }}">
       
                               <span class="errorMessage">@error('threeGcell_identification2')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>Primary scrambling code</label>
                               <input type="text" name="primary_scrambling_code2" placeholder="Entrée le Primary scrambling code" value="{{ old('primary_scrambling_code2') }}">
       
                               <span class="errorMessage">@error('primary_scrambling_code2')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>frequence (U900) </label>
                               <input type="text" name="frequence_U9002" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_U9002') }}">
       
                               <span class="errorMessage">@error('frequence_U9002')
                                   {{ $message }}
                               @enderror</span>
                           </div>
                           @if ($siteIbfos->mode != 'ConfigurationReduite')

                                <div id="tagToHide1" class="inputBox">
                                    <label>frequence (U2100) </label>
                                    <input type="text" name="frequence_U21002" placeholder="Entrée la frequence (U2100)" value="{{ old('frequence_U21002') }}">
                                    <span class="errorMessage">@error('frequence_U21002')
                                        {{ $message }}
                                    @enderror</span>
                                </div>

                            @endif
                           

                        </fieldset>
                        <fieldset class="feild">
                             <legend>Téchnologie 4G</legend>
                             <div class="inputBox">
                                <label>Physical cell identity</label>
                                <input type="text" placeholder="Entrée cell identification" name="physical_cell_identity2" value="{{ old('physical_cell_identity2') }}">
        
                                <span class="errorMessage">@error('physical_cell_identity2')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (L800)</label>
                                <input type="text" name="frequence_L8002" placeholder="Entrée la frequence (L800)" value="{{ old('frequence_L8002') }}">
        
                                <span class="errorMessage">@error('frequence_L8002')
                                    {{ $message }}
                                @enderror</span>
                            </div>
                            @if ($siteIbfos->mode != 'ConfigurationReduite')
                                    <div id="tagToHide2" class="inputBox">
                                        <label>requence (L1800)</label>
                                        <input type="text" name="requence_L18002" placeholder="Entrée la frequence (L1800)" value="{{ old('requence_L18002') }}">
                
                                        <span class="errorMessage">@error('requence_L18002')
                                            {{ $message }}
                                        @enderror</span>
                                    </div>
                            @endif
                           

                         </fieldset>
                </fieldset> 
            </div>
        </div>
        <div class="container">
            <div class="wrapper">
                  
                    <fieldset class="feild">
                    <legend> Informations du secteur 3</legend> 
                    
                    <div class="inputBox">
                        <label>Azimuth</label>
                        <input type="text" placeholder="Entrée l'azimuth du secteur" name="azimuth3" value="{{ old('azimuth3') }}">
                        
                        <span class="errorMessage">@error('azimuth3')
                            {{ $message }}
                        @enderror</span>
                    </div>        
                         <fieldset class="feild">
                             <legend>Téchnologie 2G</legend>
                             <div class="inputBox">
                                <label>cell identification</label>
                                <input type="text" placeholder="Entrée cell identification" name="cell_identification3" value="{{ old('cell_identification3') }}">
        
                                <span class="errorMessage">@error('cell_identification3')
                                    {{ $message }}
                                @enderror</span>
                            </div>
                            <div class="inputBox">
                                <label>Channel number</label>
                                <input type="text" name="channel_number3" placeholder="Entrée channel number" value="{{ old('channel_number3') }}">

                                <span class="errorMessage">@error('channel_number3')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (G900) </label>
                                <input type="text" name="frequence_G9003" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_G9003') }}">
        
                                <span class="errorMessage">@error('frequence_G9003')
                                    {{ $message }}
                                @enderror</span>
                            </div>

                         </fieldset>
                         <fieldset class="feild">
                            <legend>Téchnologie 3G</legend>
                            <div class="inputBox">
                               <label>cell identification</label>
                               <input type="text" placeholder="Entrée cell identification" name="threeGcell_identification3" value="{{ old('threeGcell_identification3') }}">
       
                               <span class="errorMessage">@error('threeGcell_identification3')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>Primary scrambling code</label>
                               <input type="text" name="primary_scrambling_code3" placeholder="Entrée le Primary scrambling code" value="{{ old('primary_scrambling_code3') }}">
       
                               <span class="errorMessage">@error('primary_scrambling_code3')
                                   {{ $message }}
                               @enderror</span>
                           </div>
       
                           <div class="inputBox">
                               <label>frequence (U900) </label>
                               <input type="text" name="frequence_U9003" placeholder="Entrée la frequence (G900)" value="{{ old('frequence_U9003') }}">
       
                               <span class="errorMessage">@error('frequence_U9003')
                                   {{ $message }}
                               @enderror</span>
                           </div>
                           @if ($siteIbfos->mode != 'ConfigurationReduite')

                                <div id="tagToHide1" class="inputBox">
                                    <label>frequence (U2100) </label>
                                    <input type="text" name="frequence_U21003" placeholder="Entrée la frequence (U2100)" value="{{ old('frequence_U21003') }}">
            
                                    <span class="errorMessage">@error('frequence_U21003')
                                        {{ $message }}
                                    @enderror</span>
                                </div>
                            
                            @endif
                           

                        </fieldset>
                        <fieldset class="feild">
                             <legend>Téchnologie 4G</legend>
                             <div class="inputBox">
                                <label>Physical cell identity</label>
                                <input type="text" placeholder="Entrée cell identification" name="physical_cell_identity3" value="{{ old('physical_cell_identity3') }}">
        
                                <span class="errorMessage">@error('physical_cell_identity3')
                                    {{ $message }}
                                @enderror</span>
                            </div>
        
                            <div class="inputBox">
                                <label>frequence (L800)</label>
                                <input type="text" name="frequence_L8003" placeholder="Entrée la frequence (L800)" value="{{ old('frequence_L8003') }}">
        
                                <span class="errorMessage">@error('frequence_L8003')
                                    {{ $message }}
                                @enderror</span>
                            </div>
                            @if ($siteIbfos->mode != 'ConfigurationReduite')

                                    <div id="tagToHide2" class="inputBox">
                                        <label>requence (L1800)</label>
                                        <input type="text" name="requence_L18003" placeholder="Entrée la frequence (L1800)" value="{{ old('requence_L18003') }}">
                
                                        <span class="errorMessage">@error('requence_L18003')
                                            {{ $message }}
                                        @enderror</span>
                                    </div>

                            @endif
                            

                         </fieldset>
                </fieldset> 
                
        </div>
    </div>
</form>
    <div class="buttonContainer">
    <button style="margin: 20px;text-align:center;" type="submit" form="myform" class="btnReverse">Submit</button>
    </div>
    </div>
</div>

</div>
</div>

<script src="{{ url('js/adminProfile.js') }}"></script>

</body>
</html>