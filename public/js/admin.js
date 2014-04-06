$('.add_city').click(function() {
    $('#add_new_city').slideToggle('fast');
});
$('.add_news').click(function() {
    $('#add_new_news').slideToggle('fast');
});

var params = {};

/**
 * добавление нового города
 */
$('.button_add_city').click(function() {
    $form = $('form');
    if ($form.find('input[name=name]').val() == '') {
        alert('Введите имя');
        return false;
    } else {
        params.name = $form.find('input[name=name]').val();
    }
    if ($form.find('input[name=addres]').val() == '') {
        alert('Введите Адрес');
        return false;
    } else {
        params.addres = $form.find('input[name=addres]').val();
    }
    if ($form.find('input[name=phone]').val() == '') {
        alert('Введите телефон');
        return false;
    } else {
        params.phone = $form.find('input[name=phone]').val();
    }
    if ($form.find('input[name=email]').val() == '') {
        alert('Введите email');
        return false;
    } else {
        params.email = $form.find('input[name=email]').val();
    }
    if ($form.find('input[name=yandex]').val() == '') {
        alert('Введите данные yandex');
        return false;
    } else {
        params.yandex = $form.find('input[name=yandex]').val();
    }
    params.addcity = 1;
    $.post('/admin/users/', params, function(result) {
        $form.find('input[name]').val('');
        $('#add_new_city').slideToggle('fast');
        if (result.result) {
            $table = $('#city');
            $table.find('tr:last').after('<tr><td>' + result.result + '</td><td>' + params.name + '</td><td>' + params.addres + '</td><td>' + params.phone + '</td><td>' + params.email + '</td><td>' + params.yandex + '</td><td><a href="#" class="commerce_delete" title="Удалить"><i class="icon-remove"></i></a></td></tr>');
            alert('Добавлено');
        }
    });

    return false;
});

/**
 * добавление новостей
 */

$('.button_add_news').click(function() {
    $form = $('form');
    if ($form.find('input[name=title]').val() == '') {
        alert('Введите заголовок');
        return false;
    }
    if ($form.find('textarea[name=text]').val() == '') {
        alert('Введите текст новости');
        return false;
    }
    alert('Добавлено');

});

// удаление новости

$('.news_delete').click(function() {
    params.deletenews = 1;
    params.id_news = $(this).attr('data-id');
    $.post('/admin/users/', params, function(result) {
        alert('Удалено');
    });
});

$('.button_login').click(function() {
    $form = $('form');
    if ($form.find('input[name=login]').val() != 'admin' || $form.find('input[name=pass]').val() != '%arttrack%') {
        alert('Неправильная пара логин-пароль');
        return false;
    } else {
        admin = $form.find('input[name=login]').val();
        expires = new Date(); // получаем текущую дату
        expires.setTime(expires.getTime() + (1000 * 86400 * 0.1)); // вычисляем срок хранения cookie
        set_cookie('admin', admin, expires); // устанавливаем cookie с помощью функции set_cookie
    }
    $.load('/admin/users/');

    //return false;
});

    // уcтанавливает cookie
    function set_cookie(name, value, expires)
    {
        if (!expires)
        {
            expires = new Date();
        }
        document.cookie = name + "=" + escape(value) + "; expires=" + expires.toGMTString() + "; path=/";
    }