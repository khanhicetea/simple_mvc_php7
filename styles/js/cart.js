$("#btn-cart").click(function () {
    _OCF('#cart-main');
    return false;
});

$("#closeCart").click(function () {
    _OCF('#cart-main');
    return false;
});

function _OCF(obj) {
    if ($(obj).css('display') === 'none')
        $(obj).slideDown();
    else {
        $(obj).slideUp();
    }
}

function _OpenF(obj) {

    $(obj).delay(300).slideDown();
}

function buyitem(id) {
    _OpenF('#cart-main');
    $.ajax({
        type: "post",
        url: "index.php?c=cart&m=addItem",
        data: {
            id: id,
            qty: 1
        },
        success: function () {
            $.ajax({
                type: "post",
                url: "index.php?c=cart&m=addCodeHtml",
                data: {
                    id: id
                },
                success: function (r) {
                    var cls = 'tr.item-cart.id' + id;
                    if (!$(cls).length)
                        $("tr.title").after(r);
                    else {
                        $(cls).addClass('old');
                        $(cls).after(r);
                        $('tr.item-cart.old').remove();
                    }
                    $("tr.item-cart").fadeIn();
                    $.ajax({
                        type: "post",
                        url: "index.php?c=cart&m=sum",
                        success: function(r){
                            $('#show_sum').html(r);
                        }
                    });
                }
            });
        }
    });
}