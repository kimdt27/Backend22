<?php
//build shopcart here!
?>

<Html>
<head>
    <Title>PHP Shopping Cart</Title>
    <link href="style.css" type="text/css" rel="stylesheet" />
</head>
<Body>
<div id="shopping-cart">
    <div class="heading">Shopping Cart <a id="emptyBtn" href="index.php?action=empty">Empty Cart</a></div>
    <?php
    //Reset total cost to do recalc
    if(isset($_SESSION["cart_item"])){
        $item_total = 0;
        ?>
        <table cellpadding="10" cellspacing="1">
            <tbody>
            <tr>
                <th><strong>Name</strong></th>
                <th><strong>Code</strong></th>
                <th><strong>Quantity</strong></th>
                <th><strong>Price</strong></th>
                <th><strong>Action</strong></th>
            </tr>
            <?php
            foreach ($_SESSION["cart_item"] as $item){
                ?>
                <tr>
                    <td><strong><?php echo $item["name"]; ?></strong></td>
                    <td><?php echo $item["code"]; ?></td>
                    <td><?php echo $item["quantity"]; ?></td>
                    <td><?php echo $item["price"]." DKK"; ?></td>
                    <td><a href="index.php?action=remove&code=<?php echo $item["code"]; ?>" class="removeBtn">Remove</a></td>
                </tr>
                <?php
                $item_total += ($item["price"]*$item["quantity"]);
            }
            ?>

            <tr>
                <td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total." DKK"; ?></td>
            </tr>
            </tbody>
        </table>
        <?php
    }
    ?>
</div>

<div>
    <div class="heading">Products</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM products ORDER BY id ASC");
    if (!empty($product_array)) {
        foreach($product_array as $aNumber=> $value){
            ?>
            <div class="product-item">
                <form method="post" action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
                    <div class="product-image"><img src="<?php echo $product_array[$aNumber]["image"]; ?>"></div>
                    <div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
                    <div class="product-price"><?php echo $product_array[$aNumber]["price"]." DKK"; ?></div>
                    <div>
                        <input type="text" name="quantity" value="1" size="2" />
                        <input type="submit" value="Add to cart" class="addBtn" /></div>
                </form>
            </div>
            <?php
        }
    }
    ?>
</div>
</Body>
</Html>