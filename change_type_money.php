<?php 
	    function change_type_money($str){ // hàm thêm dấu chấm vào vào tiền tệ ví dụ : 100000 => 100.000
    		$count = 0;
    		$newstr = '';
    		$len = strlen($str); 
    		for($i = $len-1 ; $i >= 0; $i--){
    			$newstr .= $str[$i];
    			$count ++;
    			if($count % 3 == 0 and $count!=$len){
    				$newstr .= '.';
    			}
    		}
    		return strrev($newstr);
		}
		

		function change_typeold_money($str){ // hàm xóa bỏ dấu chấm trong tiền tệ ví dụ : 100.000 => 100000
			$newstr = '';
			$len = strlen($str); 
			for($i = 0 ; $i < $len; $i++){
				if($str[$i]=='.'){
					continue;
				}else{
					$newstr .= $str[$i];
				}
				
			}
			return $newstr;
		}

        function processNameUser($str){	 // hàm cắt chuỗi để bỏ dấu '' ví dụ : "'hello'" => "hello"
            $len = strlen($str) - 2;
            $newStr = substr($str,1,$len);
            return $newStr;
        }

 ?>
