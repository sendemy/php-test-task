<?php
require_once '../classes/CProducts.php';

$id = intval($_POST['id']);
$quantity = intval($_POST['quantity']);
$products = new CProducts();

$products->updateQuantity($id, $quantity)
	?>