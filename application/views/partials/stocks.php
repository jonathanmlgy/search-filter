    <table style="border:1px solid black; width: 600px;">
        <tr>
            <th>Item name</th>
            <th>Number of stock</th>
            <th>Price</th>
            <th>Date Added</th>
        </tr>
    
<?php 
        foreach($stocks as $stock) {
?>
        <tr>
            <td><?=$stock['item_name']?></td>
            <td><?=$stock['number_of_stock']?></td>
            <td><?=$stock['price']?></td>
            <td><?=$stock['created_at']?></td>
        </tr>
<?php   }
?>
    </table>