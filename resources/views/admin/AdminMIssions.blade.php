@include('admin.AdminLayout')


<head>
    <link rel="stylesheet" href="{{ url('css/moderatorMission.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
</head>

            <div id="test-list" class="container">
                <h2>All the Missions</h2>
                @if (Session::has('message'))
                        <div class="messageUpdate">
                            {{ Session::get('message') }}
                        </div>
                @endif
                <div class="baginationAndSearch">
                  <div class="inputBox">
                    <label>Search : </label>
                    <input type="text" placeholder="Recherche par Status" class="search"/>
                </div>
                <ul class="pagination paginate"></ul>
                </div>
                <ul class="responsive-table">
                  <li class="table-header">
                    <div class="col col-1">type</div>
                    <div class="col col-2">priority</div>
                    <div class="col col-3">description</div>
                    <div class="col col-4">Delivery date</div>
                    <div class="col col-5">File</div>
                    <div class="col col-6">Status</div>
                    <div class="col col-7">Action</div>
                    
                  </li>
                </ul>
                <ul class="responsive-table list">
                  
                  @foreach ($missions as $mission)
                  <li class="table-row">
                    <div class="col col-1" data-label="type">{{ $mission->type}}</div>
                    <div class="col col-2" data-label="priority">{{ $mission->priority}}</div>
                    <div class="col col-3" data-label="description">{{ $mission->description}}</div>
                    <div class="col col-4" data-label="Delivery date">{{ $mission->dateOfDelivery}}</div>
                    <div class="col col-5" data-label="File">{{ $mission->data}}</div>
                    <div class="name col col-6" data-label="Status">{{ $mission->status}}</div>
                    <div class="col col-7" data-label="Action">
                      <a  href="/admin/mission/done/{{ $mission->mission_id }}" class="btnupdate">Terminé</a>
                      <a style="margin-left: 10px"  href="/uploads/files/{{$mission->data}}" class="btn"><i class="fas fa-download"></i></a>
                      
                </li> 
                  @endforeach
                     
 
                 
                  
                </ul>
                <ul class="responsive-table">
                <li class="table-row table-footer">

                </li>
                 
               </ul>
              </div>
        </div>
    </div>    
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



