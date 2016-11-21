<?php

//configration
require("../includes/config.php");

    // if user gets here to register (by clicking on a link )
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
        
    }

    else if($_SERVER["REQUEST_METHOD"]== "POST")
    {
        // validate submission
        if (empty($_POST["username"]))
        {
            apologize("You must provide your username.");
        }
        else if (empty($_POST["password"])|| empty($_POST["confirmation"]))
        {
            apologize("You must provide your password.");
        }
        
        // insert in  database for user
        $result = CS50::query("INSERT INTO users (username, hash, cash) values (?,?,10000.00)", $_POST["username"], crypt($_POST["password"]));
        
        if($result == false)
        {
            apologize("username not available, try another please");
        }
        
        
    }
?>