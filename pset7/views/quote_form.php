<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert"><?= htmlspecialchars($error) ?></div>
<?php endif ?>

<form action = "quote.php" method= "POST">
    <fieldset>
        <div class ="form-group">
            <input name = "quote" type = "text" placeholder = "Enter Symbol" autofocus class = "form-control"
        </div>
         <div class="form-group" style="margin-top:5px;">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                GET QUOTE
            </button>
        </div>
    </fieldset>
    
</form>


<?php if(isset($stock)): ?>
<div class = "alert-success alert" role = "alert">
        <strong>Symbol: <?= htmlspecialchars($stock["symbol"]) ?></strong><br> 
        Company: <?= htmlspecialchars($stock["name"]) ?> <br>
        Stock Price: <?= trim_zeroes($stock["price"]) ?>
</div>

<?php endif ?>

<?php if(isset($error)): ?>
<div class = "alert alert-danger" role ="alert"> <?= htmlspecialchars($error) ?></div>
<?php endif ?>