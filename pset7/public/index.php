<?php
    // configuration
    require("../includes/config.php"); 
    // query database for user's stocks
    
    
    $stocks= update_portfolio();
    

    
    
  render("portfolio.php", ["title"=>"portfolio", "stocks" => $stocks]);
    
?>