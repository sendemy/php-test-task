<?php
require_once '../classes/CProducts.php';

$products = new CProducts();
$items = $products->getProducts(12);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Products</title>
	<script
		src="https://code.jquery.com/jquery-3.7.1.min.js"
		integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
		crossorigin="anonymous">
	</script>
	<link rel="stylesheet" href="./assets/style.css">
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Название</th>
				<th>Цена</th>
				<th>Артикул</th>
				<th>Количество</th>
				<th>Дата создания</th>
				<th>Скрыть</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($items as $item): ?>
					<?php if ($item['IS_HIDDEN'] == 0): ?>
							<tr data-id="<?= $item['ID'] ?>">
								<td><?= $item['ID'] ?></td>
								<td><?= $item['PRODUCT_NAME'] ?></td>
								<td><?= $item['PRODUCT_PRICE'] ?></td>
								<td><?= $item['PRODUCT_ARTICLE'] ?></td>
								<td>
									<button class="minus">-</button>
									<span><?= $item['PRODUCT_QUANTITY'] ?></span>
									<button class="plus">+</button>
								</td>
								<td><?= $item['DATE_CREATE'] ?></td>
								<td><button class="hide-btn">Скрыть</button></td>
							</tr>
					<?php endif; ?>
			<?php endforeach; ?>
		</tbody>
	</table>

	<script src="./assets/script.js"></script>
</body>
</html>