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

$.get('/equipment/buttons/', function(data) {
    $('.buttons').html(data);
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

// уcтанавливает cookie
function set_cookie(name, value, expires)
{
    if (!expires)
    {
        expires = new Date();
    }
    document.cookie = name + "=" + escape(value) + "; expires=" + expires.toGMTString() + "; path=/";
}
