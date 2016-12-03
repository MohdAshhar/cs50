<!-- This form displays account information -->


<div class="container" style = "position:relative; left:-15px;">
    <div class = "personal" style = "float: left; width: 33%; padding: 20px;">
        <div>NAME: <strong><?= strtoupper($user_detail["username"]) ?></strong></div>
        <div>Remaining Balance: <?= $user_detail["cash"] ?></div>
        <div><a href = change.php> Change Password</div>
        
        <!-- display only after change is failed or successful--> 
        <?php if (isset($error)): ?>
            <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif ?>
        <?php if (isset($success)): ?>
            <div class="alert alert-success" role="alert"><?= htmlspecialchars($success) ?></div>
        <?php endif ?>
    </div>
   
    <div class = "shares_details" style = "float: left; width: 33%; padding: 20px;">
        
        
        
    </div>
</div>