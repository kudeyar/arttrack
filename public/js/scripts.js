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
$.get('/index/city/', function(data) {
    $('.sel_city').html(data);
});

$.get('/index/contacts/', function(data) {
    $('.contacts').html(data);
});

var maxheight = 0;
$("div.news_one").each(function() {
    if ($(this).height() > maxheight) {
        maxheight = $(this).height() + 10;
    }
});
$("div.news_one").height(maxheight);