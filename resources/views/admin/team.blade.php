@include('admin.AdminLayout')

<head>
    <link rel="stylesheet" href="{{ url('css/teamStyles.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

            <div id="test-list" class="container">
                <h2>Your team information</h2>
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
                      
                    <div class="col col-1">image</div>
                    <div class="col col-2">Role</div>
                    <div class="col col-3">Username</div>
                    <div class="col col-4">Email</div>
                    <div class="col col-5">Password</div>
                    <div class="col col-6">Phone</div>
                    <div class="col col-7">Action</div>
                    
                  </li>
                </ul>
                <ul class="responsive-table list">
                  
                  @foreach ($users as $user)
                      <li class="table-row">
                        <div class="col col-1 avatar" data-label="image"><img src="{{ url('uploads/images/'.$user->image) }}" alt=""></div>
                        <div class="col col-2" data-label="Role">{{ $user->role }}</div>
                        <div class="name col col-3" data-label="Username">{{ $user->userName }}</div>
                        <div class="col col-4" data-label="Email">{{ $user->email }}</div>
                        <div class="col col-5" data-label="Password">{{ $user->password }}</div>
                        <div class="col col-6" data-label="Phone">{{ $user->phone }}</div>
                        <div class="col col-7" data-label="Action">
                          <a onclick="DeleteAlert({{ $user->user_id }})"  style="margin-right: 5px" class="btndelete"><i class="fas fa-trash-alt"></i></a>
                          <a href="/admin/team/edit/{{ $user->user_id }}" class="btnupdate"><i class="fas fa-edit"></i></a>
                        </div>
                    </li> 
                  @endforeach
                  
                </ul>

                <ul class="responsive-table">
                <li class="table-row table-footer">
                     
                  <div class="col col-x">Add new membre to the team : </div>
               
                 <div class="col clo-y"><a href="{{ url('admin/team/add') }}" class="btnwhite">Add</a></div> 
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
      fetch('/admin/team/delete/'+id)
      .then(data => console.log(data));
    swal("Poof! Votre fichier a été supprimé !", {
      icon: "success",
    });
    window.location.href = "{{ url('Admin/team') }}";
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



