@include('admin.AdminLayout')

<head>
    <link rel="stylesheet" href="{{ url('css/messageStyle.css') }}">
    <link rel="stylesheet" href="{{ url('css/sitesPageStyles.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>  
    <script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.5.0/list.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<h1 style="text-align: center;margin:10px;">messages</h1>

<div class="Mycontainer">
    <div class="messageHolder">

        @foreach ($messages as $message)
        <fieldset>
          <legend>{{ $message->fullName }}</legend>
        <div class="cardwrapper">
          
            <div class="buttons">
                @if ($message->readStatus == 0)
                <i class="fas fa-eye-slash"></i>
                @endif
               <a onclick="DeleteAlert({{ $message->messages_id }})"><i class="fas fa-times-circle"></i></a> 
               <a href="/admin/messages/get/{{ $message->messages_id }}"><i class="fas fa-arrow-circle-right"></i></a> 
            </div>
            <div class="name">{{ $message->fullName }}</div>
            <div class="email">{{ $message->email }}</div>
            <div class="phone">{{ $message->phone }}</div>
            <div class="createdat">{{ $message->dateCreated }}</div>
            <div class="arrow">
            </div>
        </div>
      </fieldset>
        @endforeach
        
    </div>

    <div class="messageDisplay">
      <fieldset>
        <legend>Message</legend>
      
      @if (!empty($RaplyMessage))
      <h2 class="displayName">{{ $RaplyMessage->fullName }}</h2>
      <div class="displayEmail">{{ $RaplyMessage->email }}</div>
      <div class="displayPhone">{{ $RaplyMessage->phone }}</div>
        <div class="displaySubject">{{ $RaplyMessage->subject }}</div>
        <div class="displayMessage">{{ $RaplyMessage->message }}
        </div>
        <div class="displayCreatedAt">{{ $RaplyMessage->dateCreated }}</div>

      @else
      <h2 class="displayName">Prénom Nom</h2>
      <div class="displayEmail">Email@example.com</div>
        <div class="displayPhone">+212 0 00 00 00 00</div>
        <div class="displaySubject">Message Subject</div>
        <div class="displayMessage">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti aut est asperiores 
                                    labore voluptas, quo aspernatur a mollitia fugit quisquam impedit atque provident,
                                    recusandae obcaecati nostrum suscipit optio eligendi minima.
        </div>
        <div class="displayCreatedAt">2021-11-04 22:09:34</div>
      @endif
      <div class="replaySection">
        <fieldset>
          <legend>Repondre</legend>
          @if (Session::has('message'))
                    <div class="message">
                        {{ Session::get('message') }}
                    </div>
                @endif
          <form action="{{ route('admin.send.replay') }}" method="post">
            @csrf   
            @if (!empty($RaplyMessage))
            <div class="inputBox">
              <label>Email</label>
              <input type="text" name="email" value="{{ $RaplyMessage->email }}" placeholder="Enter le l'email du message">

              <span class="errorMessage">@error('email')
                  {{ $message }}
              @enderror</span>
          </div>
            @else
            <div class="inputBox">
              <label>Email</label>
              <input type="text" name="email" placeholder="Enter le l'email du message">

              <span class="errorMessage">@error('email')
                  {{ $message }}
              @enderror</span>
          </div> 
            @endif
                 
            <div class="inputBox">
              <label>Suject</label>
              <input type="text" name="suject" placeholder="Enter le sujet du message">

              <span class="errorMessage">@error('suject')
                  {{ $message }}
              @enderror</span>
          </div>
          <div class="inputBox">
            <label>Message</label>
            <textarea placeholder="Enter the mission description" style="width: 100%" name="message" id=""  rows="3"></textarea>

            <span class="errorMessage">@error('message')
                {{ $message }}
            @enderror</span>
        </div>
            <button type="submit" class="btn">Submit</button>

          </form>
        </fieldset>
      </div>
    </fieldset>
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
        fetch('/admin/message/delete/'+id)
        .then(data => console.log(data));
      swal("Poof! Votre fichier a été supprimé !", {
        icon: "success",
      });
      window.location.href = "{{ url('/admin/messages') }}";
      } else {
      swal("Votre fichier est en sécurité !");
    }
      });
    }
  </script>
  