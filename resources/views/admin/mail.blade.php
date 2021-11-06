<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>email</title>
    <style>
        .header {
            width: 100%;
            background-color: #3933b7;
            height: 100px;
            padding: 10px;
        }
        .imgLogo {
            width: 80px;
            height: 80px;
            margin-top: 10px;
            margin-left: 20px;
        }
        .wrapper {
            float: right;
            margin-right:100px; 
        }
        .UserName {
            text-align: center
        }
        .container {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="header">
        <img class="imgLogo" src="https://scontent.frak2-2.fna.fbcdn.net/v/t1.6435-9/p843x403/252777172_3090673771216942_8230210088686845741_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=730e14&_nc_eui2=AeFsC6Rq3cynEYuViULrlaXQ_BV1nubuAvv8FXWe5u4C-wzUeac1y2JwXuHjBTtNFHcTwzyH_8F2pn73WIVd4XJK&_nc_ohc=06wO9MqSY5AAX8ssgoc&_nc_ht=scontent.frak2-2.fna&oh=86f0936ab00336a754e1c084422d8430&oe=61AA5C18" alt="">
        <div class="wrapper">
            <h2 style="color: white; text-align:center;">TRANOULGA SARL AU</h2>
            <p style="color: white;text-align:center;">Keeping You Connected</p>  
        </div>        
    </div>
        @if (!empty($mailDetails['fullName']))
        <h1 class="UserName">{{ $mailDetails['fullName'] }}</h1>
        <p class="phone">Phone : {{  $mailDetails['phone'] }}</p>
        @endif
        <div class="container">
            <p>Email : {{ $mailDetails['email'] }}</p>
        </div>
        
        <p> Subject : {{$mailDetails['subject'] }}</p>
        <p> body : {{$mailDetails['message'] }}</p>
        <p>Merci</p>
</body>
</html>