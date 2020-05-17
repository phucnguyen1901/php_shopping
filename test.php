

<?php
        function processNameUser($str){
            $len = strlen($str) - 2;
            $newStr = substr($str,1,$len);
            return $newStr;
        }


        $a = '\'hello baby\'';

        $b = processNameUser($a);

        echo $b;



?>

