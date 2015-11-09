/**
 * Created by mops1k on 31.10.2015.
 */
/**
 * Created by mops1k on 31.10.2015.
 */
function get_data_link(data) {
    var i = 0;
    var additional = '';
    var length = $(data).length;
    for(var key in data) {
        additional += key + '=' + data[key];
        additional += '&';
        ++i;
    }
    console.log(length);

    return "/backend/index.php?"+additional;
}

function json_request_and_return_result(data) {
    $.get(get_data_link(data),{}, function (result) {
        return result;
    });
}

function json_request_and_insert_result(data,containerName) {
    $.get(get_data_link(data),{}, function (result) {
        $('#'+containerName).html(result);
    });
}

function clear_chat_box() {
    $('.chat-box-main').html('');
}

function generate_user() {
    var users = JSON.parse(get_users());
    if(users.length > 0) {
        var id = $(users).length + 1;
    } else {
        var id = 1;
    }
    var username = 'Guest'+id;
    createCookie('username',username,1);
    createCookie('id',id,1);

    var data = {
        'section': 'users',
        'action': 'get',
        'add': 1
    };

    var users = JSON.parse(json_request_and_return_result(data));
    return users;
}

function get_users() {
    var data = {
        'section': 'users',
        'action': 'get',
        'all': 1
    };

    var users = JSON.parse(json_request_and_return_result(data));
    return users;
}

function get_user_by_id(id) {
    var data = {
        'section': 'users',
        'action': 'get',
        'id': id
    };

    var user = JSON.parse(json_request_and_return_result(data));
    return user;
}

function get_user_by_name(name) {
    var data = {
        'section': 'users',
        'action': 'get',
        'username': name
    };

    var user = JSON.parse(json_request_and_return_result(data));
    return user;
}

function is_user_logged() {
    if(readCookie('username')) return true;
    return false;
}

function createCookie(name, value, days) {
    var expires;

    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toGMTString();
    } else {
        expires = "";
    }
    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
}

function readCookie(name) {
    var nameEQ = encodeURIComponent(name) + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) === ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) === 0) return decodeURIComponent(c.substring(nameEQ.length, c.length));
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name, "", -1);
}
