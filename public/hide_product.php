<?php
require_once '../classes/CProducts.php';

$id = intval($_POST['id']);
$products = new CProducts();

$products->hideProduct($id)
	?>