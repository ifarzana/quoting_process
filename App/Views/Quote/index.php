<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Build Empire</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/bootstrap-theme.min.css">

</head>

<body>

<div class="container">

    <h1>Quote ID : <?=$quote_id?></h1>
    <h4>User : <?php echo $user['name']. ', ' . $user['email'] . ', ' . $user['phone']; ?></h4>
    <table border="1" class="table table-hover">
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Start date</th>
            <th>End date</th>
            <th>Price</th>
        </tr>

            <?php foreach ($quote_product as $product){



                ?>
                <tr>
                    <td><?php echo $product['name']; ?></td>
                    <td><?php echo $product['quantity']; ?></td>
                    <td><?php echo $product['start_date']; ?></td>
                    <td><?php echo $product['end_date']; ?></td>
                    <td><?php echo $product['total']; ?></td>
                </tr>

            <?php } ?>




    </table>
    <h3>Total price : <?=$total_price?></h3>


</div>

</body>
</html>
