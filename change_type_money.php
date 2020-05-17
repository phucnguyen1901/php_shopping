<?php 
	    function change_type_money($str){
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
		

		function change_typeold_money($str){
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

        function processNameUser($str){
            $len = strlen($str) - 2;
            $newStr = substr($str,1,$len);
            return $newStr;
        }

 ?>
