<?php
    // configuration
    require("../includes/config.php"); 
    
    $cash= getcash();
    $stocks = update_portfolio();
    
    if($_SERVER["REQUEST_METHOD"]=='GET')
    {
        render("buy_form.php", ["title"=>"BUY", "cash" => $cash, "stocks"=> $stocks]);
    }
    
    elseif($_SERVER["REQUEST_METHOD"]=='POST')
    {
        $share= $_POST["share"];
        $symbol = strtoupper($_POST["symbol"]);
        $stock = lookup($symbol);
        $cost = $stock["price"]*$share;
        $id = $_SESSION["id"];
        
        $buy_stock = CS50::query("INSERT INTO portfolio (user_id, symbol, shares) VALUES($id, '$symbol', $share) ON DUPLICATE KEY UPDATE shares = shares + $share");
	    $update_cash = CS50::query("UPDATE users SET cash = cash - $cost WHERE id = $id");
		
		if($update_cash>0 && $buy_stock>0)
		{
		    $cash = getcash();
		    render("buy_form.php", ["title"=>"BUY", "cash"=>$cash, "stocks"=>$stocks, "msg" => "Successfully bought the shares of {$symbol}"]);
		}
        else
            render("buy_form.php", ["title"=>"BUY", "cash"=>$cash, "stocks"=>$stocks, "errmsg" => "Failed to bought the shares of {$symbol}"]);
        
    }
?>