require('./bootstrap');
window._= require('lodash');

var notifications = [];

const NOTIFICATION_TYPES = {
    comment: 'App\\Notifications\\UserCommented'
};

$(document).ready(function() {
    if(window.Laravel.userId){
        $.post('/notifications', function(data){
            addNotificationsDB(data, "#notifications");

        });

        Echo.private('App.Models.User.' + window.Laravel.userId).notification((notification) => {
          var count = parseInt($('#notifications').text());
        if(count > 20 )
        {
            $('#notifications').html('20+');

        }
        else {
          $('#notifications').text(count+1);
        }
            addNotificationsDB([notification], '#notifications');
        });
    }
});

function addNotificationsDB(newNotifications, target){
    notifications = _.concat(newNotifications, notifications);

    notifications.slice(0, 20);
    showNotificationsDB(notifications, target)
}

function showNotificationsDB(notifications, target){
    if(notifications.length){

        var htmlElements = notifications.map(function (notification){
            return makeNotificationDB(notification);
        });
        $(target + 'Menu').html(htmlElements.join(''));
        $(target).addClass('has-notifications')
    }else {
        $(target + 'Menu').html('<li><div class="notification-event"><div>Tidak ada pemberitahuan</div></div></li>');
        $(target).removeClass('has-notifications');
    }
}

function makeNotificationDB(notification){
    var notificationText = makeNotificationTextDB(notification);
    return '<li><div class="post__author author"><img src="'+urls[5]+'/'+notification.data.comment.user.file+'" alt="author"></div><div class="notification-event"><div><a class="h6 notification-friend">'+notification.data.comment.user.name+'</a> mengkomentari status <a href="javascript:void(0)" class="read-me notification-link" data-notifid="'+notification.id+'" data-postid="'+notification.data.comment.post_id+'">'+ notificationText +'</a></div> <span class="notification-date"><time class="entry-date updated" datetime="2004-07-24T18:18">4 hours ago</time></span></div><span class="notification-icon"><svg class="olymp-comments-post-icon"><use xlink:href="'+urls[17]+'"></use></svg></span></li>';

    // return '<li><div class="notification-event"><div><a href="javascript:void(0)" class="read-me notification-link" data-notifid="'+notification.id+'" data-postid="'+notification.data.comment.post_id+'">'+ notificationText +'</a></div></div></li>';
}

function makeNotificationTextDB(notification){
    var text ='';
    if(a = notification.type === NOTIFICATION_TYPES.comment){
        if(notification.data.comment.parent_id == notification.data.comment.user_id){
        const name = notification.data.comment.user.name;
        // text += '<strong>' +name+ '</strong> commented dia';
        text += 'nya';
            }if(b = notification.data.comment.parent_id == me[0] ){
                text += 'anda';
            }if((notification.data.comment.parent_id != me[0])&&(notification.data.comment.user_id !=notification.data.comment.parent_id )){
            const name = notification.data.comment.post.post_name;
            text += name;
        }
    }
    return text;
}

$(document).on('click', '.read-me',function(){
        var notif_id = $(this).data('notifid');
        var post_id = $(this).data('postid');
        $.ajax({
            url : urls[16],
            method : "POST",
            data : {notif_id:notif_id, _token:csrf_token[0]},
            dataType : 'json',
            success : function (data)
            {
                window.location.href= urls[2]+'/'+post_id;
            },
            error: function(data){
                console.log('Error:' ,data);
            }
        });
});



