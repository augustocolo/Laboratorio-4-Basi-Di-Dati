<?php
    function queryToArray($res){
        $i = 0;
        $query_line = 0;
        while($row = mysqli_fetch_row($res)) {
            $array[$i] = $row;
            $i++;
        }
        return $array;
    }
?>