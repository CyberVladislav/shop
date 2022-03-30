$(document).ready(function () {
	var total = 0;
	$('.js-confir-subtotal').each(function(){
		total += parseInt($(this).text().substr(1));
	});
	$('.js-confir-total-li').append(total);
	$('.js-confir-total').text('$' + total);
});
