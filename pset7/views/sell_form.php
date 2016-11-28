<?php $stocks = update_portfolio();
?>
    <script>
      function sellConfirm(id){

          
          if(confirm("Are you sure to sell this stock")==true)
          {
              document.getElementById(id).submit();
          }
          else
          {
             
              
          }
      }
    </script>
<div class  ="sell-table">
    
        <table class="table table-striped text-center">
        <thead>
            <th class= "text-center">Name</th>
            <th class= "text-center">Shares</th>
            <th class= "text-center">Symbols</th>
            <th class= "text-center">Value (in $)</th>
            <th class= "text-center">sell</th>
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock) : ?>
            
                <tr>
                    
                    <td><?= $stock["name"] ?></td>
                    <td><?= $stock["share"] ?></td>
                    <td><?= $stock["symbol"] ?></td>
                    <td><?= trim_zeroes($stock["price"]*$stock["share"]); ?></td>
                    <td>
                        <form action= "sell.php" method = "post" >
                            <input type = "hidden" name = "symbol" value = "<?= $stock['symbol']; ?>">
                             <input type = "hidden" name = "shares" value = "<?= $stock['share']; ?>">
                            <input type = "hidden" name = "cost" value = <?= $stock['price']*$stock['share']; ?>>
                        <button id = "<?= $stock["symbol"] ?>" onclick="sellConfirm('<?= $stock["symbol"] ?>'); return false;">SELL</button>
                        </form>
                        
                        </td>
                   
                </tr>
                 
            <?php endforeach; ?>
        </tbody>
    </table>
    
    

    
</div>