<?php 
$id= $_SESSION["id"];
$symbol = $_POST["symbol"];
$cash =$_POST["cash"];



// Configuration
require("../includes/config.php");
if($_SERVER["REQUEST_METHOD"]=='GET'){
render("sell_form.php", ["title"=>"SELL"]);
}

else if($_SERVER["REQUEST_METHOD"]=='POST')
{
    
    $delete =  CS50::query("DELETE FROM portfolio WHERE user_id =? AND symbol ='$symbol'",$_SESSION['id']);
    $update_cash = CS50::query("UPDATE users SET cash = cash + $cash where id =?",$_SESSION['id']);
    
    render("sell_form.php", ["title"=>"sell"]);
    
    
    
}

?>