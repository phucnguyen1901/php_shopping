
// Sử dụng ajax kiểm tra username

$(document).ready(function (){
    $("#username").change(function(){
        let user = document.getElementById("username").value;
        const CHECK_USERNAME = /^[a-zA-Z]/;
        if(CHECK_USERNAME.test(user)){
            $.post("handlingCheckRegister.php",{username:user},function(data){
                $("#errorusername").html(data);
                console.log(data.length);
                if(data.length < 109){   // 108 là số ký tự của username hợp lệ
                    $("#errorusername").css("color","red");
                    // document.getElementById("errorusername").style.color = 'red';
        
                }else{                   // 112 là số ký tự của username hợp lệ
                    $("#errorusername").css("color","green");
                }

             });
        }else{
            document.getElementById('errorusername').innerHTML = 'Tài khoản sai cú pháp';
            document.getElementById('errorusername').style.color = 'red';
        }
        
    });
});


