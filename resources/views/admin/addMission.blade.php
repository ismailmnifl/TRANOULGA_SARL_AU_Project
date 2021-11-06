@include('admin.AdminLayout')

<head>
<link rel="stylesheet" href="{{ url('css/addMission.css') }}">

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


<h2>Add new mission</h2>
<div class="updateSection">
    <div class="cardWrapper">
        <div class="cardheader">
            <p>View your informations : </p>
            <a href="{{ url('/admin/missions') }}" class="btn">View</a>
        </div>
        <div class="container">
            <div class="wrapper">

                @if (Session::has('message'))
                <div class="message">
                    {{ Session::get('message') }}
                </div>
            @endif

                <form action="{{ route('insert.mission') }}" method="post" enctype="multipart/form-data">
                    @csrf                   
                   
                    <div class="inputBox">
                        <label>User</label>
                        <select name="user" id="">
                            @foreach ($users as $user)
                                <option value="{{ $user->user_id }}">{{ $user->userName }}</option>
                            @endforeach
                        </select>

                        <span class="errorMessage">@error('user')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Priority</label>
                        <select name="priority" id="">
                                <option value="P1">P1</option>
                                <option value="P2">P2</option>
                                <option value="P3">P3</option>
                                
                        </select>
                        <span class="errorMessage">@error('priority')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Status</label>
                        <select name="status" id="">
                                <option value="en cours">en cours</option>
                                <option value="terminé">terminé</option>
                                
                                
                        </select>
                        <span class="errorMessage">@error('priority')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Type</label>
                        <input placeholder="Enter the type of the mission" type="text" name="type" value="">

                        <span class="errorMessage">@error('type')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    <div class="inputBox">
                        <label>Delivery Date</label>
                        <input type="date" name="dateOfDelivery" id="datefield" value="">

                        <span class="errorMessage">@error('dateOfDelivery')
                            {{ $message }}
                        @enderror</span>
                    </div>

                    
                    <div class="inputBox">
                        <label id="custom-file-upload" for="file-upload" class="custom-file-upload">
                            upload File
                        </label>
                        <input style="display: none" id="file-upload" name="data" type="file"/>

                        <span class="errorMessage">@error('image')
                            {{ $message }}
                        @enderror</span>
                    </div>
                    <div class="inputBox">
                        <label>Description</label>
                        <textarea placeholder="Enter the mission description" style="width: 100%" name="description" id=""  rows="3"></textarea>

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

<script>
var today = new Date();
var dd = today.getDate();
var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
var yyyy = today.getFullYear();
if(dd<10){
  dd='0'+dd
} 
if(mm<10){
  mm='0'+mm
} 

today = yyyy+'-'+mm+'-'+dd;
document.getElementById("datefield").setAttribute("min", today);
</script>

<script src="{{ url('js/adminProfile.js') }}"></script>

</body>
</html>