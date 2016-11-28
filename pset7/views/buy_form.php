
<script type = "text/javascript">

    // javascript function to check for the buy stock inputs and on valid inputs submit the form to buy stocks
    function checkSymbol()
    {
        var xhr;
        var symbol = document.getElementById("checksymbol").value;
        var share = document.getElementById("checkshare").value;
         var param = "symbol="+symbol+"&share="+share+"&cash=<?= $cash ?>";
         
        if((symbol.length)==0 ||(share.length) == 0)
        {
            alert("fill all the feilds above");
            return;
        }
        
        xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                var str = xhr.responseText;
                
                if(str === "true" )
                {
                    
                  document.getElementById("buyPost").submit();
                }
                else if (str === "false")
                alert("not success");
            }
        };
        xhr.open("post","getquote.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send(param);
         
         
    }

    var quote ;
   
    var xHttp;
    // function to get quote using ajax
    function getQuote(){
       quote = document.getElementById("quote").value;
       
        if(quote.length==0)
        {
            document.getElementById("putQuote").innerHTML = "";
            return;
        }
        
        xHttp = new XMLHttpRequest();
        xHttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                
                var str = xHttp.responseText;
                console.log(str);
                 document.getElementById("putQuote").innerHTML = str;
            }
        };
        xHttp.open("get", "getquote.php?quote="+quote, true);
        xHttp.send();
        
        
    }

</script>


<!-- start of buy page display -->
<div class= "container" >
   <!-- div to display quotes using ajax -->
    <div class= "quote" style="width:30%; float:left;">
         <h3> Get stock details</h3>
        <div class ="form-group">
            <input id = "quote" name = "quote" type = "text" placeholder = "Enter Symbol" autofocus class = "form-control" style = "width:90%%;">
        </div>
         <div class="form-group" style="margin-top:5px;">
            <button class="btn btn-default" type="submit" onclick = "getQuote(); return false;">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                GET QUOTE
            </button>
        </div>
        <!-- place to display the quotes requested -->
        <div id="putQuote" style= "width:100%; height:90px;">
            
            
        </div>
    </div>
    
    <!-- display for the user to buy stocks -->
    <div class = "buy" style= "width:70%; float: left;">
        
        <!-- display the available stocks -->
        <div class = "available_stocks" style= "width:50%; margin-bottom: 0px; float:left;">
            <div class ="cash-info">
                <span >Remaining Cash : <?=$cash ?></span>
                
            </div>
            
        </div>
        <!-- buy stock form inputs symbol and no. of shares , validate using javascript and ajax and submit to buy.php controller -->
        <div class = "buy_stock" style= "width:50%; margin-bottom: 0px; float:left;">
            <h3>Buy Stocks</h3>
            <form id = "buyPost" action="buy.php" method="post">
            <fieldset>
            <div class="form-group">
                <input id = "checksymbol"autocomplete="off" class="form-control" name="symbol" type="text" placeholder = "Symbol">
            </div>
            <div class="form-group">
                <input id = "checkshare" autocomplete="off" class="form-control" name="share" placeholder="Shares" type="number" min = 0>
            </div>
            <div class="form-group">
                <button class="btn btn-default" onclick = "checkSymbol(); return false;">Buy</button>
            </div>
            </fieldset>
            </form>
            
            <!-- if buying stock is successful, this div other wise the display div below it. these value transferred from buy.php controller-->
            <?php if(isset($msg)): ?>
            <div class = "alert-success alert" role = "alert"> <?= htmlspecialchars($msg) ?></div>
            <?php endif ?>
            <?php if(isset($errmsg)): ?>
            <div class = "alert-danger alert" role = "alert"> <?= htmlspecialchars($errmsg) ?></div>
            <?php endif ?>
        <!--  end of user buy stock div -->    
        </div>
        
        <!-- end of user buy stock display -->
    </div>
</div>