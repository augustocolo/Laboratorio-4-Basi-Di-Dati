<?php
    function dropdown($val,$ref){
        if (count($val)!=count($ref)){
            die(" ERROR: Value and reference are different!");
        }
        $size = count($val);
        for ($i = 0; $i<$size; $i++) {
                echo "<option value =\"";
                print($val[$i][0]);
                echo"\">";
                print($ref[$i][0]);
				echo "</option> ";
        }
    }

    function table_gen($array){
        $rows = count($array);
        for ($row = 0; $row < $rows; $row++) {
            $cols = count($array[$row]);
            echo "<tr>";
            for($col = 0; $col < $cols; $col++ ) {
                echo "<td>";
                print($array[$row][$col]);
                echo "</td>";
             } 
            echo "</tr>";
        }
    }

    function bootstrap_page_init($nomepagina){
        echo "<head> <title>";
        echo $nomepagina;
        echo " | PalestrePolito</title>";
        echo file_get_contents("repo/pageinit/pageinit_end.txt");
    }

?>