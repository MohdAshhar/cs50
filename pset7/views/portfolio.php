<div>
    
    <table class="table table-striped text-center">
        <thead>
            <th class="text-center">Symbol</th>
            <th class="text-center">Name</th>
            <th class="text-center">Shares</th>
            <th class="text-center">Price (in $) </th>
            <th class= "text-center">Value (in $)</th>
            
        </thead>
        <tbody>
            <?php foreach ($stocks as $stock) : ?>
                <tr>
                    <td><?= $stock["symbol"] ?></td>
                    <td><?= $stock["name"] ?></td>
                    <td><?= $stock["share"] ?></td>
                    <td><?= trim_zeroes($stock["price"]) ?></td>
                    <td><?= trim_zeroes($stock["price"]*$stock["share"]); ?></td>
                    
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

