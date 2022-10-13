<?php
class CartController
{
    public $itemArray;
    public $newItemArray;
    public function existingCart($existingItems)
    {
        if (!empty($existingItems)) {
            $this->itemArray["cartItem"] = $existingItems;
        }
    }
    public function cartAdd($code, $quantity)
    {
        $db_handle = new DBController();
        if (!empty($quantity)) {
            $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE code='" . $code . "'");
            $this->newItemArray = array($productByCode[0]["code"] => array(
                'name' => $productByCode[0]["name"],
                'code' => $productByCode[0]["code"],
                'quantity' => $_POST["quantity"],
                'price' => $productByCode[0]["price"]));

            if (!empty($this->itemArray["cartItem"])) {
                if (in_array($productByCode[0]["code"], array_keys($this->itemArray["cartItem"]))) {
                    foreach ($this->itemArray["cartItem"] as $k => $v) {
                        if ($productByCode[0]["code"] == $k) {
                            $this->itemArray["cartItem"][$k]["quantity"] += $_POST["quantity"];
                        }
                    }
                } else {
                    $this->itemArray["cartItem"] = array_merge($this->itemArray["cartItem"], $this->newItemArray);
                }
            } else {
                $this->itemArray["cartItem"] = $this->newItemArray;
            }
        }
    }

    public function cartRemove($code){
    //Remove item from cart
        if (!empty($this->itemArray["cartItem"])) {
            foreach ($this->itemArray["cartItem"] as $k => $v) {
                if ($code == $k)
                    unset($this->itemArray["cartItem"][$k]);
                if (empty($this->itemArray["cartItem"]))
                    unset($this->itemArray["cartItem"]);
            }
        }
    }
    public function __destruct() {
        //$_SESSION["cart_item"] = $this->itemArray;
    }
}
