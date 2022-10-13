<?php
session_start();
$product_array = array(
    array("id"=>1,"name"=>"Reading duck","code"=>"D2885","image"=>"duck1.jpg","price"=>"54.95"),
    array("id"=>2,"name"=>"Blue relaxed duck","code"=>"D2886","image"=>"duck2.jpg","price"=>"29.95"),
    array("id"=>3,"name"=>"Sporty duck","code"=>"D2887","image"=>"duck3.jpg","price"=>"44.95"),
    array("id"=>4,"name"=>"Weifu duck","code"=>"D2888","image"=>"duck4.jpg","price"=>"74.95"),
    array("id"=>5,"name"=>"Tennis duck","code"=>"D2889","image"=>"duck5.jpg","price"=>"79.95")
);

if(!empty($_GET["action"])) {
//start the switch/case
    switch($_GET["action"]) {

//adding items to cart
	case "add":
		if(!empty($_POST["quantity"])) {
            $findCodeInArray = array_search($_GET["code"],  array_column($product_array, 'code'));
            $productByCode = $product_array[$findCodeInArray];
            $itemArray = array(
                    $productByCode["code"]=>array(
                        'name'=>$productByCode["name"],
                        'code'=>$productByCode["code"],
                        'quantity'=>$_POST["quantity"],
                        'price'=>$productByCode["price"]
                    )
            );
            //overwrite items with new quantity
            /*if (!empty($_SESSION["cart_item"])){
                $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
            }
            else{
                $_SESSION["cart_item"] = $itemArray;
            }*/

            //add quantity to existing item
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode["code"] == $k) {
                                    $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;

//Remove item from cart
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $cartItemCode => $v) {
					if($_GET["code"] == $cartItemCode)
						unset($_SESSION["cart_item"][$cartItemCode]);
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
//Empty the entire cart
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<html>
<head>
<title>PHP Shopping Cart</title>
<link href="style.css" type="text/css" rel="stylesheet" />
</head>
<body>
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
<td colspan="5" align=right><strong>Total:</strong> <?php echo $item_total. " DKK"; ?></td>
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
    if (!empty($product_array)) {
		foreach($product_array as $aNumber=> $value){
	?>
		<div class="product-item">
			<form method="post" action="index.php?action=add&code=<?php echo $product_array[$aNumber]["code"]; ?>">
			<div class="product-image"><img src="img/<?php echo $product_array[$aNumber]["image"]; ?>"></div>
			<div><strong><?php echo $product_array[$aNumber]["name"]; ?></strong></div>
			<div class="product-price"><?php echo $product_array[$aNumber]["price"]. " DKK"; ?></div>
			<div>
                <input type="text" name="quantity" value="1" size="2" />
                <input type="submit" value="Add to cart" class="addBtn" />
            </div>
			</form>
		</div>
	<?php
			}
	}
	?>
</div>
</body>
</html>