$('.form_login').submit(function () {
    var data = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (data) {

            if (data == 'Error') {
                $('.error_login').html(' <div class="alert alert-warning alert-dismissible fade show " role="alert">\n' +
                    '            <strong>Error!</strong> Не правильный логин или пароль.\n' +
                    '            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '                <span aria-hidden="true">&times;</span>\n' +
                    '            </button>\n' +
                    '        </div>');
            }else {
                document.cookie = "login_user="+data;
                window.location.href = '/';
            }


        },
        error: function (xhr, str) {
            alert('Ошибка: ' + xhr.responseCode);
        }
    });

    return false;
});


$('.add_task').submit(function () {
    var data = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (data) {

            // $('.error_task').html(data);

            if (data == 'Error') {
                $('.error_task').html(' <div class="alert alert-warning alert-dismissible fade show " role="alert">\n' +
                    '            <strong>Error!</strong> Проверьте все поля.\n' +
                    '            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '                <span aria-hidden="true">&times;</span>\n' +
                    '            </button>\n' +
                    '        </div>');
            }else {
                window.location.href = '/';
            }


        },
        error: function (xhr, str) {
            alert('Ошибка: ' + xhr.responseCode);
        }
    });

    return false;
});

$('.update_task').submit(function () {
    var data = $(this).serialize();
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        type: "GET",
        data: data,
        success: function (data) {

            // $('.error_task').html(data);

            if (data == 'Error') {
                $('.error_task').html(' <div class="alert alert-warning alert-dismissible fade show " role="alert">\n' +
                    '            <strong>Error!</strong> Проверьте все поля.\n' +
                    '            <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '                <span aria-hidden="true">&times;</span>\n' +
                    '            </button>\n' +
                    '        </div>');
            }else {
                window.location.href = '/';
            }


        },
        error: function (xhr, str) {
            alert('Ошибка: ' + xhr.responseCode);
        }
    });

    return false;
});


$('.logout').click(function () {
    // console.log(document.cookie);
    deleteCookie('login_user');
    location.reload()
    // console.log(document.cookie);
    // $(this).parent().html('<a class="nav-link" href="/user">Login</a>');
    // $('.btn_group_task').remove();
});


function deleteCookie(name) {
    document.cookie = name+"=;max-age=-1";
}

$('#inputGroupSelect01').change(function () {
    window.location.href = $(this).val();
    // console.log($(this).val());
});