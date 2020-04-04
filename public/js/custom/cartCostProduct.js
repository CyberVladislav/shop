$(document).ready(function () {
    var thisCoast = 0;
    $(".price-choosen-product").each(function() {
        thisCoast += parseInt($(this).attr('price-of-product'));
        $('.sub-total').text("$"+thisCoast);
    });
    $(".price-choosen-product").change(function(){
        var count = $(this).attr('count');
        var number = $(this).val(); 
        $(this).attr('count',+number);

        var price = $(this).attr('price-of-product');
        var idOfProduct = $(this).attr('id-of-product');

        var totalCoast = number * price;
        $('.price-product-'+idOfProduct).text("$"+totalCoast);
        thisCoast += ((number-count) * price);
        $('.sub-total').text("$"+thisCoast);
    });
});
