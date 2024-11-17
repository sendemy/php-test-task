$('.hide-btn').on('click', function () {
	const row = $(this).closest('tr')
	const id = row.data('id')

	$.ajax({
		url: 'hide_product.php',
		method: 'POST',
		data: { id: id },
		success: function () {
			row.remove()
		},
	})
})

$('.plus, .minus').on('click', function () {
	const row = $(this).closest('tr')
	const id = row.data('id')
	const span = row.find('span')
	let quantity = parseInt(span.text())

	if ($(this).hasClass('plus')) {
		quantity++
	} else if ($(this).hasClass('minus') && quantity > 0) {
		quantity--
	}

	span.text(quantity)

	$.ajax({
		url: 'update_quantity.php',
		method: 'POST',
		data: { id: id, quantity: quantity },
	})
})
