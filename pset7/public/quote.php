<?php

// Configuration
require("../includes/config.php");

// check if to render form or info
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    // render form
    render("quote_form.php", ["title" => "QUOTE"]);
}

else if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $stock = lookup($_POST["quote"]);
    
    if($stock !== false)
    {
        render("quote_form.php", ["title" => "get quote", "stock" => $stock]);
    }
    
    else 
    {
        render("quote_form.php",["title" => "get quote", "error" => "Could not fetch info for {$_POST["quote"]}, please try again."]);
    }
}

?>