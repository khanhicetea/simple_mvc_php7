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