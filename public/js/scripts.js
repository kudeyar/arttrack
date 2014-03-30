$('.getCommerce').click(function() {
    $.get('/index/getcommerce/', function(data) {
        $('.form_commerce').html(data);
    });
    $('.form_commerce').slideToggle();
    return false;
});

$('.getCall').click(function() {
    $.get('/index/tellorder/', function(data) {
        $('.form_call').html(data);
    });
    $('.form_call').slideToggle();
    return false;
});