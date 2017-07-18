<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your Cafe - Welcome</title>
    @include('partials.header')    
</head>
<body style="background-image: url('{{ asset('img/background-idocafe.png') }}'); margin: 0; padding: 0">
<div class="container"">
    <div style="color:white;" align="center">
        <h1 class="brand" style="font-size: 40pt;">Your Cafe</h1>
        <p>Silahkan Order Menu yang Anda Inginkan!</p>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            @include('order.partials.orderForm')
        </div>
    </div>



    @include('partials.script')
    @include('order.partials.orderScript')
    <div class="row" style="margin-top: 30px; margin-bottom:20px; color: white;">
        <div class="col-md-12">
            <div align="center" style=" font">Copyright © 2017 - Giant Light Production</div>
        </div>
    </div>
</div>

</body>
</html>