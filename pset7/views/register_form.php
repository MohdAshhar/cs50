<form action="register.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="username" placeholder="Username" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="password" placeholder="Password" type="password"/>
        </div>
        <div class = "form-group">
            <input class = "form-control" name = "confirmation" placeholder = "confirm password" type = "password"/>
        </div>
        
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                REGISTER
            </button>
        </div>
    </fieldset>
</form>
<div>
    or <a href="login.php">Login</a> for an account
</div>


<script>
    
    alert("welcome to register.php");
</script>