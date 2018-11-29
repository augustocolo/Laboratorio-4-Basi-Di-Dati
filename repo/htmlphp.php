<?php
    function dropdown($val,$ref){
        if (count($val)!=count($ref)){
            die(" ERROR: Value and reference are different!");
        }
        $size = count($val);
        $i = 0;
        for ($i = 0; $i<size; $i++) {
            echo "<options value = '$val'>$ref</options>";
        }
    }
?>