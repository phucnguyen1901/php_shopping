





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<script>
    $(document).ready(function (){
        $("#username").change(function(){
            let user = document.getElementById("username").value;
            $.post("handlingCheckRegister.php",{username:user},function(data){
                $("#div1").html(data);
            })
        });
    })

//     $(document).ready(function(){
//          $("button").click(function(){
//         $("#div1").load("login.php");
//   });
// });
</script>
<body>

    <div id="div1"></div>
    <input type="text" id="username">
    <button id="quat">quat</button>
    
</body>
</html>