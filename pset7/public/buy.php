<?php
    // configuration
    require("../includes/config.php"); 
    
    if($_SERVER["REQUEST_METHOD"]=='GET')
    {
        render("buy_form.php", ["title"=>"BUY"]);
    }
    
?>