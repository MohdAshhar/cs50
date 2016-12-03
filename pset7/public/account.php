<?php
    // configuration
    require("../includes/config.php"); 
    
    
    $stocks = [];
    $user_detail;
    
    //query for detail
    $user_detail = CS50::query("SELECT username, cash FROM users where id=?", $_SESSION["id"]);
    
    // get the details of stocks user currently have 
    $rows = CS50::query("SELECT symbol, shares FROM portfolio where user_id=?",$_SESSION["id"]);
    
    
    if($rows>0) 
    {
        foreach($rows as $row)
        {
            $stocks[] =[
                "symbol" => $row["symbol"],
                "share" => $row["shares"]
                ]; 
        }
    }
    
if($_SERVER["REQUEST_METHOD"]=="GET")
{
    
    if($stocks>0 &&$user_detail>0 )
    render("account_view.php", ["title"=>"ACCOUNT", "stocks"=>$stocks, "user_detail"=>$user_detail[0]]);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $hash = CS50::query("SELECT hash FROM users where id=?",$_SESSION["id"]);
    
    print(crypt($_POST["old_pw"]));
    
    
    if($hash>0)
    {
        if(password_verify($_POST["old_pw"], $hash[0]["hash"]))
        {
            $new_hash = crypt($_POST["new_pw"]);
            $row = CS50::query("UPDATE users SET hash =? where id=?",$new_hash,$_SESSION["id"]);
            if($row>0)
            {
                render("account_view.php", ["title"=>"ACCOUNT", "stocks"=>$stocks, "user_detail"=>$user_detail[0],"success"=>" Your Password changed successfully "]);
            }
            else
            {
                render("account_view.php", ["title"=>"ACCOUNT", "stocks"=>$stocks, "user_detail"=>$user_detail[0] ,"error"=>"Error while updating, try again"]);
            }
        }
        else
        {
            render("account_view.php", ["title"=>"ACCOUNT", "stocks"=>$stocks, "user_detail"=>$user_detail[0], "error"=>"Old password does not match, try again"]);
        }
    }
    else
    {
        render("account_view.php", ["title"=>"ACCOUNT", "stocks"=>$stocks, "user_detail"=>$user_detail[0], "error"=>"Could not access database, try again"]);
    }
}


?>