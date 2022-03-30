jQuery(($) => {
    var totalCost = 0;
    $(".price-choosen-product").each(function() {
        var count = parseInt($(this).attr('count'));
        var idProduct = parseInt($(this).attr('id-of-product'));
        var price = parseInt($(this).attr('price-of-product'));

        $('.js-count-product-'+idProduct).text('x'+count);

        var productCost = count * price;
        $('.price-product-'+idProduct).text("$"+productCost);
        totalCost += productCost;
        $('.sub-total').text("$"+totalCost);
    });
    // Уменьшаем на 1 
    $(document).on('click', '.inputTN__bottom', function () {
        let totalNeg = $(this).prev().prev();
        if ( totalNeg.val() > 1 ) {
            totalNeg.val(+totalNeg.val() - 1);
        }
        var idOfProduct = $(this).attr('id-of-product');
        var pageElement = document.getElementById('product_' +idOfProduct);

        var count = $(pageElement).attr('count');
        var number = $(pageElement).val();
        $(pageElement).attr('count',+number);

        $('.js-count-product-'+idOfProduct).text('x'+number);

        var price = $(pageElement).attr('price-of-product');

        var productCost = number * price;
        $('.price-product-'+idOfProduct).text("$"+productCost);
        totalCost += ((number-count) * price);
        $('.sub-total').text("$"+totalCost);
    });
    // Увеличиваем на 1 
    $(document).on('click', '.inputTN__top', function () {
        let totalPos = $(this).prev();
        totalPos.val(+totalPos.val() + 1);
        
        var idOfProduct = $(this).attr('id-of-product');
        var pageElement = document.getElementById('product_' +idOfProduct);

        var count = $(pageElement).attr('count');
        var number = $(pageElement).val();
        $(pageElement).attr('count',+number);

        $('.js-count-product-'+idOfProduct).text('x'+number);

        var price = $(pageElement).attr('price-of-product');

        var productCost = number * price;
        $('.price-product-'+idOfProduct).text("$"+productCost);
        totalCost += ((number-count) * price);
        $('.sub-total').text("$"+totalCost);
    });
    // Запрещаем ввод текста 
    document.querySelectorAll('.inputTN__input').forEach(function (el) {
        el.addEventListener('input', function () {
            this.value = this.value.replace(/[^\d]/g, '');
        });
    });
});
