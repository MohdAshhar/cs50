<?php 

// Configuration
require("../includes/config.php");

$id= $_SESSION["id"];

// Retrieves all the transactions from the database ordered by date
	
	$history = CS50::query("SELECT id, symbol, status, shares, price, date FROM history WHERE user_id =? ORDER BY date DESC", $id);
	
	
	
    // render portfolio
    render("history_view.php", ["title" => "History", "history" => $history]);
?>