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

    function bootstrap_head($nomepagina){
        echo "<head> <title>";
        echo $nomepagina;
        echo " | PalestrePolito</title>";
        echo "<meta charset=\"utf-8\">
              <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
              <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css\">
              <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js\"></script>
              <script src=\"https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js\"></script>
              <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js\"></script>
            </head>";
            
    }
    
    function bootstrap_navbar(){
        echo file_get_contents("repo/pageinit/navbar.html");
    }
    
    function bootstrap_errorBar(){
        if(isset($_REQUEST['status'])&&isset($_REQUEST['message'])){
            echo "<div class=\"alert alert-".$_REQUEST['status']."\">".$_REQUEST['message']."</div>";
        }
    }
    
    function hiddenResponse($status, $message,$destination,$method){
        echo "<form name=\"response\" action=\"".$destination."\" method=\"".$method."\">";
        echo "<input type=\"hidden\" name=\"status\" value=\"".$status."\">";
        echo "<input type=\"hidden\" name=\"message\" value=\"".$message."\">";
        echo "</form>";
        echo "<script type=\"text/javascript\"> document.response.submit();</script>";
        echo "</html>";
    }

?>