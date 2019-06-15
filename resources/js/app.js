require('./bootstrap');
window._= require('lodash');

var notifications = [];

const NOTIFICATION_TYPES = {
    comment: 'App\\Notifications\\UserCommented',
    agenda: 'App\\Notifications\\UserAgenda'
};

$(document).ready(function() {

    if(window.Laravel.userId){
        $.post('/notifications', function(data){
            addNotificationsDB(data, ".idnotifications");
        });

        Echo.private('App.Models.User.' + window.Laravel.userId).notification((notification) => {
          var count = parseInt($('#idnotifications').text());
          var countmobile = parseInt($('#mobileidnotifications').text());

        if(count > 19 && countmobile >19)
        {
            $('.idnotifications').html('20+');

        }
        else {
          $('.idnotifications').text(count+1);
        }
            addNotificationsDB([notification], '.idnotifications');
            if(count != 0)
            $('.count-notif').text(originalTitle+' ('+ (count+1) +')');
            if(count > 19)
            $('.count-notif').text(originalTitle+' (20+)');
            else{
            $('.count-notif').text(originalTitle+' ('+ (count+1) +')');

            }

            // if(a = notification.type === NOTIFICATION_TYPES.comment){
            //     var notificationText = makeNotificationTextDB(notification);
            //     var commentText = notification.data.comment.user.name+' mengkomentari status'+ notificationText;

            //     if (! ('Notification' in window)) {
            //         alert('Web Notification is not supported');
            //         return;
            //     }

            //     Notification.requestPermission( permission => {
            //         let notification = new Notification('Bimko Notifikasi!', {
            //         body: commentText,
            //         icon: "https://pusher.com/static_logos/320x320.png"
            //         });

            //         notification.onclick = () => {
            //             window.open(window.location.href);
            //         };
            //     });

            // }
            // if(a = notification.type === NOTIFICATION_TYPES.agenda){
            //     var agendaText = notification.data.agenda.creator+' Mengundang anda untuk menghadiri rapat '+ notification.data.agenda.name +'di '+notification.data.agenda.place;
            //     if (! ('Notification' in window)) {
            //         alert('Web Notification is not supported');
            //         return;
            //     }

            //     Notification.requestPermission( permission => {
            //         let notification = new Notification('Bimko Notifikasi!', {
            //         body: agendaText,
            //         icon: "https://pusher.com/static_logos/320x320.png"
            //         });

            //         notification.onclick = () => {
            //             window.open(window.location.href);
            //         };
            //     });
            // }

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
    if(a = notification.type === NOTIFICATION_TYPES.comment){
        return '<li><div class="post__author author"></div><div class="notification-event"><div><a href="'+urls[14]+'/'+notification.data.comment.user_id+'" class="h6 notification-friend">'+notification.data.comment.user.name+'</a> mengkomentari status <a href="javascript:void(0)" class="read-me notification-link" data-notifid="'+notification.id+'" data-postid="'+notification.data.comment.post_id+'">'+ notificationText +'</a></div> <span class="notification-date"><time class="entry-date updated" datetime="'+notification.created_at+'"></time></span></div><span class="notification-icon"><svg class="olymp-comments-post-icon"><use xlink:href="'+urls[17]+'"></use></svg></span></li>';
    }
    if(a = notification.type === NOTIFICATION_TYPES.agenda){
        return '<li><div class="post__author author"></div><div class="notification-event"><div><a href="'+urls[14]+'/'+notification.data.agenda.user_id+'" class="h6 notification-friend">'+notification.data.agenda.creator+'</a> Mengundang anda untuk menghadiri rapat <a href="javascript:void(0)" class="read-me-agenda notification-link" data-notifid="'+notification.id+'" >"'+ notification.data.agenda.name +'" </a> di '+notification.data.agenda.place+'</div> <span class="notification-date"><time class="entry-date updated" datetime="'+notification.created_at+'"></time></span></div><span class="notification-icon"><svg class="olymp-calendar-icon"><use xlink:href="'+urls[21]+'"></use></svg></span></li>';
    }

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

$(document).on('click', '.read-me-agenda',function(){
    var notif_id = $(this).data('notifid');
    $.ajax({
        url : urls[16],
        method : "POST",
        data : {notif_id:notif_id, _token:csrf_token[0]},
        dataType : 'json',
        success : function (data)
        {
            window.location.href= urls[15];
        },
        error: function(data){
            console.log('Error:' ,data);
        }
    });
});




