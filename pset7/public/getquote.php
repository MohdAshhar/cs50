<?php

// Configuration
require("../includes/config.php");


if($_SERVER["REQUEST_METHOD"] =="GET")
{
     $stock = lookup($_GET["quote"]);
     $error = "Could not fetch info for{$_GET["quote"]}, please try again.";

?>
<?php if($stock!== false){
echo '<div class = "alert-success alert" role = "alert">
        <strong>Symbol:'.htmlspecialchars($stock["symbol"]).'</strong><br> 
        Company: '.htmlspecialchars($stock["name"]).'<br>
        Stock Price:'.trim_zeroes($stock["price"]).'
</div>';
}
else{
    echo '<div class = "alert alert-danger" role ="alert">'.htmlspecialchars($error).'</div>';
}
}

elseif($_SERVER["REQUEST_METHOD"] =="POST")
{
    
    $stock = lookup($_POST["symbol"]);
    $cash = $_POST["cash"];
    $amount = $stock["price"]*$_POST["share"];
    $id = $_SESSION["id"];
    
    if($stock !== false)
    {
        if(preg_match("/^\d+$/", $_POST["share"]))
        {
            if($amount<=$cash)
            {
                echo "true";
            }
            else
            echo "false";
            
        }
        else
            echo "false";
        
        
    }
    else
    {
        echo "false";
    }
    
}
 ?>