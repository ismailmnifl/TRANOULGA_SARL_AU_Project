@include('admin.AdminLayout')
<head>
    <link rel="stylesheet" href="{{ url('css/sitesPageStyles.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

            <div id="test-list" class="container">
                <h2>Archive des sites</h2>
                @if (Session::has('message'))
                        <div class="messageDelete">
                            {{ Session::get('message') }}
                        </div>
                @endif
                <div class="baginationAndSearch">
                  <div class="inputBox">
                    <label>Search : </label>
                    <input type="text" placeholder=" Recherche par nome" class="search"/>
                </div>
                <ul class="pagination paginate"></ul>
                </div>

                <ul class="responsive-table">
                  <li class="table-header">
                      
                    <div class="col col-1">Name</div>
                    <div class="col col-2">Mode</div>
                    <div class="col col-3">Latitude</div>
                    <div class="col col-4">Longitude</div>
                    <div class="col col-5">Height</div>
                    <div class="col col-6">Client</div>
                    <div class="col col-7">Date Created</div>
                    <div class="col col-8">Actions</div>
                    
                    
                  </li>
                </ul>
                <ul class="responsive-table list">
                  
                  @foreach ($sites as $site)
                      <li class="table-row">
                        <div class="name col col-1 avatar" data-label="Name">{{ $site->name }}</div>
                        <div class="col col-2" data-label="Mode">{{ $site->mode }}</div>
                        <div class="col col-3" data-label="Latitude">{{ $site->latitude }}</div>
                        <div class="col col-4" data-label="Longitude">{{ $site->longitude }}</div>
                        <div class="col col-5" data-label="Height">{{ $site->height }}</div>
                        <div class="col col-6" data-label="Client">{{ $site->client }}</div>
                        <div class="col col-7" data-label="Date Created">{{ $site->dateCreated }}</div>
                        <div class="col col-8" data-label="Action">
                          <a onclick="DeleteAlert({{ $site->site_id }})"  style="margin-right: 5px" class="btndelete"><i class="fas fa-trash-alt"></i></a>
                          <a href="/admin/sites/update/{{  $site->site_id }}" style="margin-right: 5px" class="btnupdate"><i class="fas fa-edit"></i></a>
                          <a href="/admin/sites/export/pdf/{{ $site->site_id }}" class="btn"><i class="fas fa-print"></i></a>
                          
                        </div>
                    </li> 
                  @endforeach
                  
                </ul>

                <ul class="responsive-table">
                <li class="table-row table-footer">
                     
                  <div class="col col-x">Add new membre to the team : </div>
               
                 <div class="col clo-y"><a href="{{ url('/admin/sites/add') }}" class="btnwhite">Add</a></div> 
                </ul>
       </li>
              </div>
        </div>
    </div>
    
    
    
<script>
  function DeleteAlert(id) {
    swal({
    title: "Es-tu sûr?",
    text: "Une fois supprimé, vous ne pourrez plus récupérer ce fichier !",
    icon: "warning",
    buttons: true,
    dangerMode: true,

    })
    .then((willDelete) => {

    if (willDelete) {
      fetch('/admin/site/delete/'+id)
      .then(data => console.log(data));
    swal("Poof! Votre fichier a été supprimé !", {
      icon: "success",
    });
    window.location.href = "{{ url('/admin/sites') }}";
    } else {
    swal("Votre fichier est en sécurité !");
  }
    });
  }
</script>

<script>
      var monkeyList = new List('test-list', {
      valueNames: ['name'],
      page: 3,
      pagination: true
      });
</script>
    <script src="{{ url('js/adminProfile.js') }}"></script>
 
</body>
</html>



