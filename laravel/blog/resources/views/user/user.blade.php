<!doctype html>
<meta name="csrf-token" content="{{ csrf_token() }}">

{{--<html lang="{{ app()->getLocale() }}">--}}
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->

</head>
<body>

<br>
    <span>用户名：</span><input type="text" id="name">
    <br>
    <span>密码：</span><input type="text" id="pwd">
    <br>
    <button onclick="login()">登录</button>
</body>
</html>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    function login() {
        var name=$("#name").val();
        var pwd=$("#pwd").val();
       $.ajax({

           url:'<?php echo url("login")?>',
           data: {
               '_token': $('meta[name=csrf-token]').attr("content"),
               name: name,
               pwd:pwd
           },
           type:'post',
           dataType:'json',
           success:function (res) {
               if(res.code==1){
                   alert(res.data)
               }else{
                   location.href='<?php echo url("list") ?>'
               }
           }
       })
    }
</script>
