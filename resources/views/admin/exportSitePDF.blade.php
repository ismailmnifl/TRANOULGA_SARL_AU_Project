<html>
<head>
  <style>
      :root{
    --main:#3933b7;
    --secondry:#508dd3;
    --gradient:linear-gradient(120deg, var(--main), var(--secondry));
}
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap');
*{
    font-family: 'Poppins', sans-serif;
}
html{
    font-size: 62.5%;
}
    @page { 
        margin: 67px 0px;
     }
    header { 
        position: fixed; 
        top: -60px; 
        left: 0px; 
        right: 0px; 
        width: 100%;
        height: 80px;
        color: white;
        background-color: #3933b7;
        height: 50px;
        padding: 10px;
        padding-bottom: 10px;
        margin-bottom: 100px;
    }
    header .wrapper .imageHolder img {
        width: 60px;
        height: 60px;
    }
    header .wrapper .imageHolder {
        position: absolute;
        top: 5px;
        left: 100px;
    }
    header .wrapper .titleHolder {
        position: absolute;
        left: 600px;
        top: 5px;
        text-align: center;
    }
    header .wrapper .titleHolder h2{
        margin-bottom: -10px;
        
    }
    header .wrapper .titleHolder p{
        color: white;
    }
    .wrapper {
        width: 100%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding-bottom: 20px;
    }

    footer { 
        position: fixed;
        bottom: -60px; 
        left: 0px; 
        right: 0px; 
        background-color: #3933b7; 
        height: 50px; 
        color: white;
        text-align: center;
        padding: 10px;
        padding-top: 10px;
    }
    p { 
        page-break-after: always;
    }
    p:last-child { 
        page-break-after: never;
    }
    footer .pagenum:before {
      content: counter(page);
    }
    main {
        padding: 30px;
    }
    main .reppotTiltle{
        text-align: center;
        color: #3933b7;
    }
    
fieldset {
    border: 1px dashed #3933b7;
    border-radius: 10px;
    padding: 10px;
}
fieldset legend{
    color: #3933b7;
    font-weight: bold;
}

.title {
    font-weight: bold;
    color: #3933b7;
    margin: 5px;
}
.info {
    color: black;
    font-weight:normal;
}
.mainwrapper {
    width: 100%;
}
#sectors {
    position: absolute;
    float : right;
    top: 0px;
}
.siteInfos {
    width: 49%;
}

table {
    width: 100%;
}
#customers {
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid grey;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding: 3px;
  text-align: left;
  background-color: white;
  color: black;
}
.secteursContainer {
    width: 100%;
}
.topSction {
    display: flex;
    align-items: center;
    justify-content: space-evenly;
    margin-bottom: 20px;
}
#test {
    position: relative;
    float: right;
}
.spacer {
    width: 100%;
    height: 20px;
}
#rowTech {
    max-width: 100px;
}
.sectorTitle {
    color: #3933b7;
    margin-bottom: 5px;
    font-size: 20px;
    text-align: center;
}
.firstFieldset {
  height: 157px;
}
  </style>
</head>
<body>
  <header>
      <div class="wrapper">
        <div class="imageHolder">
            <img src="{{ public_path('images/logoTNL.jpg') }}" alt="">
          </div>
          <div class="titleHolder">
              <h2>TNL Solutions</h3>
            <p>Keeping you connected</p>
          </div>
      </div>

  </header>
  <footer>
    <div class="pagenum-container">Page <span class="pagenum"></span></div>
  </footer>
  <main>
     <h3 class="reppotTiltle">Rapport pour le site : {{ $sites->name }}</h3>

<div class="mainwrapper">
    <div class="topSction">
        <div class="siteInfos">
            <fieldset class="firstFieldset">
                    <legend>
                        les informations du site 
                    </legend>
                    <div class="title">Index : <span class="info">{{ $sites->site_id }}</span></div>
                    <div class="title">Name : <span class="info">{{ $sites->name }}</span></div>
                    <div class="title">Mode : <span class="info">{{ $sites->mode }}</span></div>
                    <div class="title">Latitude : <span class="info">{{ $sites->latitude }}</span></div>
                    <div class="title">Longitude : <span class="info">{{ $sites->longitude }}</span></div>
                    <div class="title">Height : <span class="info">{{ $sites->height }}</span></div>
                    <div class="title">Client : <span class="info">{{ $sites->client }}</span></div>
                    <div class="title">Date Created : <span class="info">{{ $sites->dateCreated }}</span></div>
                    
            </fieldset>
        </div>
        <div id="test" class="siteInfos">
            <fieldset>
                    <legend>
                        les informations du site 
                    </legend>
                    <div class="title">Nom de l'organisme : <span class="info">TNL Solutions</span></div>
                    <div class="title">Email : <span class="info">Tranaulgasarlau@Gmail.com</span></div>
                    <div class="title">Téléphone : <span class="info">+212 6 61 70 58 75</span></div>
                    <div class="title">Adresse : <span class="info">213 Rue LAKHLISS QU INDUSTRIEL SAFI</span></div>
                    <div class="title">Représentant de l'organisme : <span class="info">Nawfal LOUGDALI</span></div>
                    <div style="text-decoration: underline;" class="title">Pour l'organisme : <span class="info"></span></div>
                    <div class="title">Représentant du document : <span class="info"></span></div>
                    <div class="title">Nom :  <span class="info"></span></div>
                    <div class="title">Signature :  <span class="info"></span></div>

            </fieldset>
        </div>
        
        </div>

        <div class="secteursContainer">
            <fieldset>
                    <legend>
                        les informations des secteurs
                    </legend>
                        <div class="sectorTitle">Premier Secteur</div>
                        
                    <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Channel number</th>
                          <th scope="col">Frequence(G900)</th>
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 2G</th>
                          <td>{{ $sectorsOf2G[0]->cell_identification }}</td>
                         <td>{{ $sectorsOf2G[0]->channel_number }}</td>
                          <td>{{ $sectorsOf2G[0]->frequence_G900 }}</td>
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Primary scrambling code</th>
                          <th scope="col">frequence(U900)</th>
                          @if (isset($sectorsOf3G[0]->frequence_U2100))
                          <th scope="col">frequence(U2100)</th>
                          @endif
                          
                          
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 3G</th>
                          <td>{{ $sectorsOf3G[0]->cell_identification }}</td>
                          <td>{{ $sectorsOf3G[0]->primary_scrambling_code }}</td>
                          <td>{{ $sectorsOf3G[0]->frequence_U900 }}</td>
                          @if (isset($sectorsOf3G[0]->frequence_U2100))
                          <td>{{ $sectorsOf3G[0]->frequence_U2100 }}</td>
                          @endif
                          
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Physical cell identity</th>
                          <th scope="col">frequence(L800)</th>
                          @if (isset($sectorsOf4G[0]->frequence_L1800))
                          <th scope="col">Frequence(L1800)</th>
                          @endif
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 4G</th>
                          <td>{{ $sectorsOf4G[0]->physical_cell_identity }}</td>
                          <td>{{ $sectorsOf4G[0]->frequence_L800 }}</td>
                          @if (isset($sectorsOf4G[0]->frequence_L1800))
                          <td>{{ $sectorsOf4G[0]->frequence_L1800 }}</td>
                          @endif
                        </tr>
                        
                      </table>
                    
            </fieldset>
        </div>
        <div class="spacer"></div>
        <div class="secteursContainer">
            <fieldset>
                    <legend>
                        les informations des secteurs
                    </legend>
                        <div class="sectorTitle">Deuxième Secteur</div>
                        
                    <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Channel number</th>
                          <th scope="col">Frequence(G900)</th>
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 2G</th>
                          <td>{{ $sectorsOf2G[1]->cell_identification }}</td>
                         <td>{{ $sectorsOf2G[1]->channel_number }}</td>
                          <td>{{ $sectorsOf2G[1]->frequence_G900 }}</td>
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Primary scrambling code</th>
                          <th scope="col">frequence(U900)</th>
                          @if (isset($sectorsOf3G[1]->frequence_U2100))
                          <th scope="col">frequence(U2100)</th>
                          @endif
                          
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 3G</th>
                          <td>{{ $sectorsOf3G[1]->cell_identification }}</td>
                          <td>{{ $sectorsOf3G[1]->primary_scrambling_code }}</td>
                          <td>{{ $sectorsOf3G[1]->frequence_U900 }}</td>
                          @if (isset($sectorsOf3G[1]->frequence_U2100))
                          <td>{{ $sectorsOf3G[1]->frequence_U2100 }}</td>
                          @endif
                          
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Physical cell identity</th>
                          <th scope="col">frequence(L800)</th>
                          @if (isset($sectorsOf4G[1]->frequence_L1800))
                          <th scope="col">Frequence(L1800)</th>
                          @endif
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 4G</th>
                          <td>{{ $sectorsOf4G[1]->physical_cell_identity }}</td>
                          <td>{{ $sectorsOf4G[1]->frequence_L800 }}</td>
                          
                          @if (isset($sectorsOf4G[1]->frequence_L1800))
                          <td>{{ $sectorsOf4G[1]->frequence_L1800 }}</td>
                          @endif
                        </tr>
                        
                      </table>
                    
            </fieldset>
        </div>
        <div class="spacer"></div>
        <div class="secteursContainer">
            <fieldset>
                    <legend>
                        les informations des secteurs
                    </legend>
                        <div class="sectorTitle">Troisième Secteur</div>
                        
                    <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Channel number</th>
                          <th scope="col">Frequence(G900)</th>
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 2G</th>
                          <td>{{ $sectorsOf2G[2]->cell_identification }}</td>
                         <td>{{ $sectorsOf2G[2]->channel_number }}</td>
                          <td>{{ $sectorsOf2G[2]->frequence_G900 }}</td>
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Cell identification</th>
                          <th scope="col">Primary scrambling code</th>
                          <th scope="col">frequence(U900)</th>
                          @if (isset($sectorsOf3G[2]->frequence_U2100))
                          <th scope="col">frequence(U2100)</th>
                          @endif
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 3G</th>
                          <td>{{ $sectorsOf3G[2]->cell_identification }}</td>
                          <td>{{ $sectorsOf3G[2]->primary_scrambling_code }}</td>
                          <td>{{ $sectorsOf3G[2]->frequence_U900 }}</td>
                          @if (isset($sectorsOf3G[2]->frequence_U2100))
                          <td>{{ $sectorsOf3G[2]->frequence_U2100 }}</td>
                          @endif
                          
                        </tr>
                        
                      </table>
                      <table id="customers">
                        <tr>
                          <td></td>
                          <th scope="col">Physical cell identity</th>
                          <th scope="col">frequence(L800)</th>
                          @if (isset($sectorsOf4G[2]->frequence_L1800))
                          <th scope="col">Frequence(L1800)</th>   
                          @endif
                        </tr>
                        <tr>
                          <th id="rowTech" scope="row">Téchnologie 4G</th>
                          <td>{{ $sectorsOf4G[2]->physical_cell_identity }}</td>
                          <td>{{ $sectorsOf4G[2]->frequence_L800 }}</td>
                          @if (isset($sectorsOf4G[2]->frequence_L1800))
                          <td>{{ $sectorsOf4G[2]->frequence_L1800 }}</td>
                          @endif
                        </tr>
                        
                      </table>
                    
            </fieldset>
        </div>
    </div>            
</div>
      
  </main>
</body>
</html>