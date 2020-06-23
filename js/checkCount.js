
// kiểm tra số lượng nhập vào khi mua phải lớn hơn 0


function save(){
    let count = parseInt(document.forms['formAddProduct'].qty.value);

    if(count < 1){
        alert("So luong nho hon 1");
    }else{
        alert("OK");
    }


    // if(count == 1 ){
    //     let a = 1
    //     onSubmit();
    // }else{
    //     onSubmit(0)
    // }

}



