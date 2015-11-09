$(document).ready(function () {
    var room_id = $('#sendMessage').attr('data-room');

    $.get('/room/'+room_id+'/list',{}, function (html) {
        $('.chat-box-main').html(html);
    });

    $('#sendMessage').click(function () {
        $.post('/room/'+room_id,{ 'message': $('#message').val() }, function (data) {
            if(data) {
                $.get('/room/'+room_id+'/list',{}, function (html) {
                    $('.chat-box-main').html(html);
                });
                $('#message').val('');
            }
        },'json');
    });

    $('#message').keypress(function (e) {
        if (e.which == 13) {
            $.post('/room/'+room_id,{ 'message': $('#message').val() }, function (data) {
                if(data) {
                    $.get('/room/'+room_id+'/list',{}, function (html) {
                        $('.chat-box-main').html(html);
                    });
                    $('#message').val('');
                }
            },'json');
        }
    });

    $.ajax({
        url: uri,
        type: 'PUT',
        success: function(result) {
            var users = JSON.parse(result);
            var insert = '';
            for(i in users) {
                template =  '<div class="chat-box-online-left">';
                if(users[i]['id'] == window.user['id']) {
                    template =  '<div class="chat-box-online-right">';
                }
                template += '    -  '+users[i]['name'];
                template += '<br />';
                template += '( <small>'+users[i]['last_activity'];
                template += '</small> )';
                template += '</div>';
                template += '<hr class="hr-clas-low" />';

                insert += template;
            }

            $('.chat-box-online').html(insert);
        }
    });

    setInterval(function() {
        $.ajax({
            url: uri,
            type: 'PUT',
            success: function(result) {
                var users = JSON.parse(result);
                var insert = '';
                for(i in users) {
                    template =  '<div class="chat-box-online-left">';
                    if(users[i]['id'] == window.user['id']) {
                        template =  '<div class="chat-box-online-right">';
                    }
                    template += '    -  '+users[i]['name'];
                    template += '<br />';
                    template += '( <small>'+users[i]['last_activity'];
                    template += '</small> )';
                    template += '</div>';
                    template += '<hr class="hr-clas-low" />';

                    insert += template;
                }

                $('.chat-box-online').html(insert);
            }
        });
    }, 60000);

    setInterval(function() {
        $.get('/room/'+room_id+'/list',{}, function (html) {
            $('.chat-box-main').html(html);
        });
    }, 500);
});
