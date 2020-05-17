

// Họ tên: Nguyễn Trọng Phúc 
// MSSV  : B1706744
// Nhóm  : 04


function register(){
    const fullname      = document.getElementById("fullname").value
    const username      = document.getElementById("username").value;

    fullname.innerHTML  = "GOOD";
    username.style.color = 'red';
}


function save(){
    const fullname      = document.getElementById("fullname").value
    const username      = document.getElementById("username").value;
    const password      = document.getElementById("password").value;
    const repeatpassword     = document.getElementById("repeatpassword").value;
    const address         = document.getElementById("address").value;
    const numberphone   = document.getElementById("numberphone").value;

    const CHECK_USERNAME         = /^[a-zA-Z]/;
    const CHECKT_PASSWDADD       = /[a-z]/; // passwd chứa ký tự thường
    const CHECKT_PASSWDADD2      = /\W/;    // passwd chứa ký tự đặc biệt
    const CHECKT_PASSWDADD3      = /[A-Z]/; // passwd chứa ký tự viết hoa
    const CHECKT_PASSWDADD4      = /[0-9]/; // passwd chứa số
    const CHECKT_PASSWDADD5      =  -1      // passwd không chứa họ tên 
    const CHECK_EMAIL            = /^\w+@gmail.com$/i;
    const CHECK_NUMBERPHONE      = /\d{4}-\d{3}-\d{3}/
    
    let number = 0

    // CHECK FULLNAME
    if(fullname !== ''){
        document.getElementById("errorfullname").innerHTML = "";
        document.getElementById("fullname").style.border = "2px solid green";
        number++;
    }else{
        document.getElementById("errorfullname").innerHTML = "Họ tên không được rỗng";
        document.getElementById("errorfullname").style.color = "red";
        document.getElementById("fullname").style.border = "2px solid red";
    }

    // CHECK USERNAME
    if(CHECK_USERNAME.test(username)){
        document.getElementById("errorusername").innerHTML = "";
        document.getElementById("username").style.border = "2px solid green";
        number++;
    }else{
        document.getElementById("errorusername").innerHTML = "Username không được rỗng và phải bắt đầu bằng ký tự";
        document.getElementById("errorusername").style.color = "red";
        document.getElementById("username").style.border = "2px solid red";
    }


    // CHECK PASSWORD 
    if(CHECKT_PASSWDADD.test(password) && CHECKT_PASSWDADD2.test(password) &&CHECKT_PASSWDADD3.test(password)
        &&CHECKT_PASSWDADD4.test(password) && password.search(fullname) == CHECKT_PASSWDADD5
        && password.length >= 8 && password.length<=16){
        number++;
        document.getElementById("errorpassword").innerHTML = "";
        document.getElementById("password").style.border = "2px solid green";
    }else{
        document.getElementById("errorpassword").innerHTML = "Mật khẩu phải từ 8-16 ký tự (phải chứa ký tự , số ,ký tự đặc biệt, có chữ hoa và thường ,không chứa họ tên)";
        document.getElementById("errorpassword").style.color = "red";
        document.getElementById("password").style.border = "2px solid red";
    }


    // CHECK repeatpassword
    if(password == repeatpassword && repeatpassword !== ''){
        document.getElementById("errorrepeatpassword").innerHTML = "";
        document.getElementById("repeatpassword").style.border = "2px solid green";
        number++;
    }else if(repeatpassword == ''){
        document.getElementById("errorrepeatpassword").innerHTML = "Mời nhập lại mật khẩu";
        document.getElementById("errorrepeatpassword").style.color = "red";
        document.getElementById("repeatpassword").style.border = "2px solid red";
    }else{
        document.getElementById("errorrepeatpassword").innerHTML = "Mật khẩu nhập lại không giống";
        document.getElementById("errorrepeatpassword").style.color = "red";
        document.getElementById("repeatpassword").style.border = "2px solid red";
    }

    // CHECK MAIL
    if(CHECK_EMAIL.test(email)){
        document.getElementById("erroremail").innerHTML = "";
        document.getElementById("email").style.border = "2px solid green";
        number++;
        
    }else{
        document.getElementById("erroremail").innerHTML = "Email phải có định dạng: user@gmail.com";
        document.getElementById("erroremail").style.color = "red";
        document.getElementById("email").style.border = "2px solid red";
      
    }

    //CHECK NUMBERPHONE
    if(CHECK_NUMBERPHONE.test(numberphone) && numberphone.length===12){
        document.getElementById("errornumberphone").innerHTML = "";
        document.getElementById("numberphone").style.border = "2px solid green";
        number++;
        
    }else{
        document.getElementById("errornumberphone").innerHTML = "Phải đúng định dạng ví dụ: 0795-418-148 (10 số)";
        document.getElementById("errornumberphone").style.color = "red";
        document.getElementById("numberphone").style.border = "2px solid red";
    }

    // if(number==6){
    //     document.getElementById("result").innerHTML = "Kiểm tra thành công"+"<br>"+"<br>"+
    //                                                   "Họ tên: "+fullname+"<br>"+"<br>"+
    //                                                   "Tên đăng nhập: "+username+"<br>"+"<br>"+
    //                                                   "PASSWORD: "+password+"<br>"+"<br>"+
    //                                                   "Email: "+email+"<br>"+"<br>"+
    //                                                   "Số điện thoại: "+numberphone+"<br>"

    // }else{
    //     document.getElementById("result").innerHTML = "Kiểm tra không thành công do còn cột nhập sai quy định";
    // }
    

}


function onSubmit(){
    return false;
}
