<div>
    
    <table class="table table-striped text-center">
        <thead>
            <th class="text-center">Transaction-type</th>
            <th class="text-center">Date</th>
            <th class="text-center">Symbol</th>
            <th class="text-center">Shares </th>
            <th class= "text-center">Value (in $)</th>
            
        </thead>
        <tbody>
            <?php foreach ($history as $stock) : ?>
                <tr>
                    <td><?= $stock["status"] ?></td>
                    <td><?= $stock["date"] ?></td>
                    <td><?= $stock["symbol"] ?></td>
                    <td><?= $stock["shares"] ?></td>
                    <td><?= trim_zeroes($stock["price"]) ?></td>
                    
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

