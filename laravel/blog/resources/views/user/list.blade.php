<!doctype html>
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<span>登录成功</span>
<a href="<?php echo url("out") ?>">退出登录</a><br>
<input type="text" id="name"><button onclick="add()">添加</button>
<table border="1" id="table">

</table>
</body>
</html>
<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
    function show() {
        $.ajax({
            url:'<?php echo url("sel")?>',
            dataType:'json',
            success:function (res) {
                var tr=''
                var code=res.data
                for (var i=0; i<code.length; i++){
                    tr=tr+"<tr><td>"+code[i]['name']+"</td><td><a href='' onclick='del("+code[i]['id']+")'>删除</a></td></tr>"
                }
                $("#table").html(tr)
            }
        })
    }
    function add() {
        var name=$("#name").val()
        $.ajax({
            url:'<?php echo url("add")?>',
            dataType:'json',
            data: {
                '_token': $('meta[name=csrf-token]').attr("content"),
                name:name,
            },
            type:'post',
            success:function (res) {
                console.log(res)
            }
        })
    }
    show()
</script>

