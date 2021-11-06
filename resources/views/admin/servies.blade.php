@include('admin.AdminLayout')


<head>
    <link rel="stylesheet" href="{{ url('css/servies.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>


<div id="test-list" class="container">
    <h2>All the Missions</h2>
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
        <div class="col col-1">Image</div>
        <div class="col col-2">Titre</div>
        <div class="col col-3">Déscription</div>
        <div class="col col-4">date de publication</div>
        <div class="col col-5">Actions</div>
        

        
      </li>
    </ul>
    <ul class="responsive-table list">
      @foreach ($serives as $serive)
        

      <li class="table-row">
        <div class="name col col-1 avatar" data-label="Image"><img src="{{ url('uploads/images/'.$serive->image) }}" alt=""></div>  
        <div class="col col-2" data-label="Titre">{{ $serive->title }}</div>
        <div class="col col-3" data-label="Déscription">{{ $serive->description }}</div>
        <div class="col col-4" data-label="Date">{{ $serive->dateCreated }}</div>
        <div class="col col-5" data-label="Action">
          <a onclick="DeleteAlert({{ $serive->servie_id }})" style="margin-right: 5px" class="btndelete"><i class="fas fa-trash-alt"></i></a>
          <a href="/admin/services/update/{{ $serive->servie_id }}" class="btnupdate"><i class="fas fa-edit"></i></a>
        </div>
    </li> 
    @endforeach

    </ul>

    <ul  class="responsive-table">

          <li class="table-row table-footer">
            
            <div class="col col-x">Add new Mission : </div>
        
          <div class="col clo-y"><a href="{{ url('/admin/services/add') }}" class="btnwhite">Add</a></div> 
      
        </li>
    </ul>
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
      fetch('/admin/services/delete/'+id)
      .then(data => console.log(data));
    swal("Poof! Votre fichier a été supprimé !", {
      icon: "success",
    });
    window.location.href = "{{ url('/admin/services') }}";
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