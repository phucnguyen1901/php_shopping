


// Sử dụng ajax kiểm tra username

$(document).ready(function (){
    $("#username").change(function(){
        let user = document.getElementById("username").value;
        const CHECK_USERNAME = /^[a-zA-Z]/;
        if(CHECK_USERNAME.test(user)){
            $.post("handlingCheckUsername.php",{username:user},function(data){
                $("#errorusername").html(data);
                console.log(data.length);
                if(data.length < 109){   // nếu username đã có trong database trả về length của data = 108
                    $("#errorusername").css("color","red");
                }else{                   // nếu username không có trong database trả về length của data = 112
                    $("#errorusername").css("color","green");
                }

             });
        }else{
            document.getElementById('errorusername').innerHTML = 'Tài khoản sai cú pháp';
            document.getElementById('errorusername').style.color = 'red';
        }
        
    });

});


$(document).ready(function (){
    $("#repeatpassword").change(function(){
        let password = document.getElementById("password").value;
        let repeatpassword = document.getElementById("repeatpassword").value;
        $.post("handlingCheckPassword.php",{password:password,repeatpassword:repeatpassword},function(data){
            $("#errorrepeatpassword").html(data);
            console.log(data);
            console.log(data.length);
            if(data.length < 90){   // nếu nhập lại password không giống với password trả về length của data = 87
                $("#errorrepeatpassword").css("color","red");
            }
        });
    });

});


//submit form

function save(){
    let user = document.getElementById('username').value;
    let password = document.getElementById('password').value;
    let repeatpassword = document.getElementById('repeatpassword').value;
    let numberphone = document.getElementById('numberphone').value;
    const CHECK_USERNAME = /^[a-zA-Z]/;
    const CHECK_NUMBERPHONE = /^[0-9]/;
    if(CHECK_USERNAME.test(user) && CHECK_NUMBERPHONE.test(numberphone) && password==repeatpassword){
        return true;
    }else{
        return false;
    }
}
