<?php 
$id= $_SESSION["id"];




// Configuration
require("../includes/config.php");
if($_SERVER["REQUEST_METHOD"]=='GET'){
render("sell_form.php", ["title"=>"SELL"]);
}

else if($_SERVER["REQUEST_METHOD"]=='POST')
{
    
    $symbol = $_POST["symbol"];
    $cost =$_POST["cost"];
    $shares = $_POST["shares"];
    
    $delete =  CS50::query("DELETE FROM portfolio WHERE user_id =? AND symbol ='$symbol'",$_SESSION['id']);
    $update_cash = CS50::query("UPDATE users SET cash = cash + $cost where id =?",$_SESSION['id']);
    $history = CS50::query("INSERT INTO history (user_id, symbol, status, shares, price) VALUES(?, '$symbol','SELL',$shares,$cost)",$_SESSION['id']);
    
    if($history>0)
    {
    render("sell_form.php", ["title"=>"sell"]);
    }
    else
    print("failed".$history);
    
    
}

?>