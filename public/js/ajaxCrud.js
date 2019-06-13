$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

//post statusform
    $('#statusForm').on('submit',(function(e) {
    e.preventDefault();
    var fileku = $('#file_1').val();
    if(fileku!='')
    {
        $('.size_error').html("");
        var file_size = $('#file_1')[0].files[0].size;
        if(file_size > 5097000) {
            $('.size_error').html("maksimal ukuran file 5MB")
            return false;
        }
    }
    var formData = new FormData(this);
    var formURL = $('#statusForm').attr("action");
    $.ajax({
        type:'POST',
        url: formURL,
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(data){
            // console.log(data);
            location.reload();

        },
        error: function(data){
            var error = data.responseJSON.errors;
                swal({
                    title: "gagal posting status",
                    text: error,
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                });
        }
            });
    }));


//post fileform
    $('#uploadForm').on('submit',(function(e) {
        var fileku = $('#file_2').val();
        if(fileku=='')
        {
            alert("file kosong, silahkan pilih file");
        }
    e.preventDefault();
    $('.size1_error').html("");
    var file_size = $('#file_2')[0].files[0].size;
    if(file_size > 20097000) {
        $('.size1_error').html("maksimal ukuran file 20MB")
        return false;
    }
    var formData = new FormData(this);
    var formURL = $('#uploadForm').attr("action");

    $.ajax({
        type:'POST',
        url: formURL,
        data:formData,
        cache:false,
        contentType: false,
        processData: false,
        success:function(result){
            location.reload();

        },
        error: function(data){
                var error = data.responseJSON.errors;
                    swal({
                        title: "gagal upload file",
                        text: error,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    });
        }
         });
    }));

//get value edit status
    $('body').on('click', '#edit-post1', function(){
        var post_id = $(this).data("id");
        $.get(urls[2] + '/' + post_id + '/edit', function(data){
            $('#postCrudModal').html("Edit status");
            $('#btn-save').val('.edit-post');
            $('#ajax-crud-modal').modal('show');
            $('#user_id').val(data.user_id);
            $('#content1').val(data.content);
            $('#postid').val(data.id);
            document.getElementById('filename_upload_3').innerHTML=data.file_1;
        });

    });
//get value edit file
    $('body').on('click', '#edit-post2', function(){
        var post_id = $(this).data("id");
        $.get(urls[2] + '/' + post_id + '/edit', function(data){
            $('#postCrudModal2').html("Edit file");
            $('#btn-save2').val('.edit-post2');
            $('#ajax-crud-modal2').modal('show');
            $('#user_id2').val(data.user_id);
            $('#content2').val(data.content);
            $('#title2').val(data.title);
            $('#postid2').val(data.id);
            document.getElementById('filename_upload_4').innerHTML=data.file_2;
        });
    });

// update post1
    // $('body').on('click', '#btn-save1', function(){
    $('#updateForm1').on('submit',(function(e) {
        e.preventDefault();
        var fileku = $('#file_3').val();
        if(fileku!='')
        {
            $('.size3_error').html("");
            var file_size = $('#file_3')[0].files[0].size;
            if(file_size > 5097000) {
                $('.size3_error').html("maksimal ukuran file 5MB")
                return false;
            }
        }
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        var post_id = $("#ajax-crud-modal").find("input[name='id']").val();
        $.ajax({
            dataType: 'json',
            type:'POST',
            url: urls[2] + '/status' + '/' + post_id,
            // data: {content:content, user_id:user_id},
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#ajax-crud-modal').modal('hide');
                location.href=urls[2]+ '/' +post_id;
                // location.href=urls[2]+ '/' +post_id;
                // $("#khusus"+post_id).load(location.href + " #khusus"+post_id);
            },
            error: function(data){
                var error = data.responseJSON.errors;
                    swal({
                        title: "gagal posting status",
                        text: error,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    });
            }
        });

    }));

//  update post2
    $('#updateForm2').on('submit',(function(e) {
        var fileku = $('#file_4').val();

        if(fileku!='')
        {
        e.preventDefault();
        $('.size4_error').html("");
        var file_size = $('#file_4')[0].files[0].size;
        if(file_size > 20097000) {
            $('.size4_error').html("maksimal ukuran file 20MB")
            return false;
        }
        }
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        var post_id = $("#ajax-crud-modal2").find("input[name='id']").val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: urls[2] + '/post' + '/' + post_id,
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#ajax-crud-modal2').modal('hide');
                // $("#khusus"+post_id).load(location.href + " #khusus"+post_id);
                location.href=urls[2]+ '/' +post_id;


                // $("#khusus" + post_id).replaceWith(update1);
             },
             error: function(data){
                var error = data.responseJSON.errors;
                    swal({
                        title: "gagal upload file",
                        text: error,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    });
            }
        });

    }));

//delete post
    $('body').on('click', '.delete-post', function(){
        var post_id = $(this).data("id");
        // console.log(lastFive);
        swal({
            title: "Apakah kamu yakin akan hapus postingan ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        type: "DELETE",
                        url: urls[2] + '/' + post_id,
                        success: function(response){
                            swal("Data telah terhapus", {
                                icon: "success",
                            });
                            location.reload();
                            // $("#data-post").load(location.href + " #data-post");
                        },
                        error: function(data){
                            // console.log('Error:' ,data);
                        }
                    });
                }
            });

    });

    // addcomment load and index
    $('body').on('submit','.form-komen', (function(e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);
        $.ajax({
            type:'POST',
            url: urls[3],
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // console.log(data);
                var created = data[0]['created_at']
                var ago = moment(created);
                var timeAgo = ago.fromNow();
                // console.log(timeAgo);
                // console.log([urls[5]])
                post_id = data[0]['post_id'];
                comment_id = data[0]['id'];
                // $("#comment"+post_id).load(location.href + " #comment"+post_id);
                // $("#countcomment"+post_id).load(location.href + " #countcomment"+post_id);

                var comment = '<ul class="comments-list" id="comment-list"><div class="komen"><li class="comment-item"><input type="hidden" name="ax" class="name_val" value="'+comment_id+'"><input type="hidden" name="post" class="name_val" value="'+post_id+'"><div class="post__author author vcard inline-items"><img src="'+urls[5]+'/'+data[1][0]['file']+'" alt="author"><div class="author-date"><a class="h6 post__author-name fn" href="'+urls[14]+'/'+data[0]['user_id']+'">'+data[1][0]['name']+'</a> <div class="post__date"><time datetime="'+data[0]['created_at']+'" class="published"></time></div></div><div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'+urls[7]+'"></use></svg><ul class="more-dropdown"><li><a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="'+data[0]['post_id']+'" data-id="'+data[0]['id']+'">Hapus Komentar</a></li></ul></div></div><p>'+data[0]['message']+'</p></li></div></ul>';
                var count ='<div class="post-additional-info inline-items"><div class="comments-shared"><a class="post-add-icon inline-items"><svg class="olymp-speech-balloon-icon"><use xlink:href="'+urls[9]+'"></use></svg><span>'+data[2]+'</span></a></div></div>';
                $('#comment'+post_id).prepend(comment);
                $("#countcomment" + post_id).html(count);
                $(".btn-comment-show").html("Tulis Komentar");
                document.getElementById("comment-form"+post_id).reset();
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                document.getElementById("btn-comment"+post_id).disabled = true,
                document.getElementById("btn-comment"+post_id).style.pointerEvents = "none";
                // $('#btn-comment').hide();
            },
            error: function(data){
                // console.log(data);
            }
        });
    }));


    // delete comment index
    $('body').on('click', '.delete-comment', function(){
        var idpost = $(this).parents('div.komen').find('input[name=post]').val();
        var idku = $(this).parents('div.komen').find('input').val();
        // var idku = $("#comment-list"+post_id+"> li.comment-item > input:text.name_val").val();
        swal({
            title: "Apakah kamu yakin akan hapus komentar ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        type: "DELETE",
                        url: urls[3] + '/' + idku,
                        success: function(){
                            swal("Data telah terhapus", {
                                icon: "success",
                            });
                            location.href=urls[2]+ '/' +idpost;
                            // $("#data-post").load(location.href + " #data-post");
                            // location.reload(urls[2]+post_id);
                            // $("#comment"+idpost).load(location.href + "#comment"+idpost);
                            // $("#countcomment"+idpost).load(location.href + "#countcomment"+idpost);
                        },
                        error: function(data){
                            // console.log('Error:' ,data);
                        }
                    });
                }
            });
    });

    //addcommentshow
    $('body').on('submit','#comment-form-show', (function(e) {
        e.preventDefault();
        var data = new FormData($(this)[0]);
        $.ajax({
            type:'POST',
            url: urls[3],
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success:function(data){
                // console.log(data);
                // console.log([urls[5]])
                post_id = data[0]['post_id'];
                comment_id = data[0]['id'];
                $("#comment"+post_id).load(location.href + " #comment"+post_id);
                $("#countcomment"+post_id).load(location.href + " #countcomment"+post_id);
                $(".btn-comment-show").html("Tulis Komentar");

                document.getElementById("comment-form-show").reset();
                var x = document.getElementById("snackbar");
                x.className = "show";
                setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
                document.getElementById("btn-comment"+post_id).disabled = true,
                document.getElementById("btn-comment"+post_id).style.pointerEvents = "none";
                // $('#btn-comment').hide();
            },
            error: function(data){
                // console.log(data);
            }
        });
    }));

     // delete comment show
     $('body').on('click', '.delete-comment-show', function(){
        var comment_id = $(this).data("id");
        var post_id = $(this).data("post");
        // var idku = $("#comment-list"+post_id+"> li.comment-item > input:text.name_val").val();
        swal({
            title: "Apakah kamu yakin akan hapus komentar ini ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                if(willDelete){
                    $.ajax({
                        type: "DELETE",
                        url: urls[3] + '/' + comment_id,
                        success: function(){
                            swal("Data telah terhapus", {
                                icon: "success",
                            });
                            $("#comment"+post_id).load(location.href + " #comment"+post_id);
                            $("#countcomment"+post_id).load(location.href + " #countcomment"+post_id);
                        },
                        error: function(data){
                            // console.log('Error:' ,data);
                        }
                    });
                }
            });
    });
//for index and show and profil
    $('.comment-form textarea').on('keyup', function(){
        var id = $(this).data("id");
        // console.log(id);
    if($.trim(this.value).length > 0)
        document.getElementById("btn-comment"+id).style.pointerEvents = "auto",
        document.getElementById("btn-comment"+id).disabled = false;

    else
        document.getElementById("btn-comment"+id).disabled = true,
        document.getElementById("btn-comment"+id).style.pointerEvents = "none";

    });

//for loadmore index
$(document).on('keyup', '.tgInput', function(){
        var id = $(this).data("id");
        // console.log(id);
    if($.trim(this.value).length > 0)
        document.getElementById("btn-comment"+id).style.pointerEvents = "auto",
        document.getElementById("btn-comment"+id).disabled = false;

    else
        document.getElementById("btn-comment"+id).disabled = true,
        document.getElementById("btn-comment"+id).style.pointerEvents = "none";

    });

$(document).on('keyup', '.search-here', function(){
    $value =$(this).val();

    if($.trim(this.value).length > 0)
        $.ajax({
            type: 'get',
            url: urls[13],
            data:{'search':$value},
            success:function(data){
                $('.im-here').html(data);
            }
        });
        else
        var noresult = '';
        $('.im-here').html(noresult);
    });

    //get value agenda list
    $('body').on('click', '#view-detail', function(){
        var agenda_id = $(this).data("id");
        $.get(urls[15] + '/' + agenda_id + '/show', function(data){
            document.getElementById("update-agenda-btn").style.display = "none";
            var newdate = moment(new Date(data[0]['start_At'] )).format("DD/MM/YYYY");
            var newtime = moment(new Date(data[0]['start_At'] )).format("HH:mm");
            $('#view-agenda').modal('show');
            document.getElementById("date").style.display = "block";
            $('#name').val(data[0]['name']);
            document.getElementById("name").disabled = true;
            $('#date').val(newdate);
            document.getElementById("date").disabled = true;
            $('#time').val(newtime);
            document.getElementById("time").disabled = true;
            $('#place').val(data[0]['place']);
            document.getElementById("place").disabled = true;
            $('#description').val(data[0]['description']);
            document.getElementById("description").disabled = true;
            document.getElementById("editdate").style.display = "none";
            document.getElementById("notulen-input").style.display = "block";
            document.getElementById("agenda-file").style.display = "block";
            if(data[0]['detail_agenda']!=null){
            if(data[0]['detail_agenda']['summary']!=null){
            $('#agenda_not').val(data[0]['detail_agenda']['summary']);
            }
            }else{
            $('#agenda_not').val('rapat belum dilaksanakan');
            }
            if(data[0]['detail_agenda']!=null){
                if(data[0]['detail_agenda']['file']!=null){
            document.getElementById('filename_file').innerHTML='<a style="color:blue" href="'+urls[15]+ '/' +agenda_id+ '/download">'+data[0]['detail_agenda']['file']+'</a>';
            }else{
            document.getElementById('filename_file').innerHTML="File belum diupload";
            }
            }else{
            document.getElementById('filename_file').innerHTML="File belum diupload";
            }
            // console.log(data[0]['detail_agenda']['file']);
            // $('#postid').val(data.id);
        });

    });

    //get value agenda for update
    $('body').on('click', '#edit-agenda', function(){
        var agenda_id = $(this).data("id");
        $.get(urls[15] + '/' + agenda_id + '/show', function(data){
            $('#title-modal').html("Tambah Data Notulensi Rapat " +'"' +data[0]['name']+'"');
            $('#agenda_id').val(data[0]['id']);
            $('#add-notulensi').modal('show');
            $('#agenda_name').val(data[0]['name']);
        });

    });

    // add notulensi
    $('#notulensiForm').on('submit',(function(e) {
        var fileku = $('#file').val();

        if(fileku!='')
        {
            $('.size_error').html("");
            var file_size = $('#file')[0].files[0].size;
            if(file_size > 20097000) {
                $('.size_error').html("maksimal ukuran file 20MB")
                return false;
            }
        }
        e.preventDefault();
        var agenda_id = $("#add-notulensi").find("input[name='agenda_id']").val();
        var data = new FormData($(this)[0]);

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: urls[15] +'/detailstore',
            data: data,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                // console.log(data);
                $('#add-notulensi').modal('hide');
                location.reload();

                // location.href=urls[2]+ '/' +post_id;
                // $("#khusus" + post_id).replaceWith(update1);
             },
             error: function(data){
                var error = data.responseJSON.errors;
                    swal({
                        title: "gagal upload file",
                        text: error,
                        icon: "error",
                        buttons: true,
                        dangerMode: true,
                    });
            }
        });

    }));

    //get for approve
    $('body').on('click', '#approve-article', function(){
            var feed_id = $(this).data("id");
            $.get(urls[20] + '/' + feed_id + '/show', function(data){
                // console.log(data);
                $('.statusyes').val(1);
                $('.agree-btn').show();
                $('.disagree-btn').hide();
                $('.agree-btn').html("Setujui Artikel");
                $('#title-modal').html("Setujui artikel judul " +'"' +data.name+'"');
                $('#feed_id').val(data.id);
                $('.agree-modal').modal('show');
            });

    });

    //get for disapprove
    $('body').on('click', '#deny-article', function(){
        var feed_id = $(this).data("id");
        $.get(urls[20] + '/' + feed_id + '/show', function(data){
            // console.log(data);
            $('.statusyes').val(0);
            $('.agree-btn').hide();
            $('.disagree-btn').show();
            $('.disagree-btn').html("Tolak Artikel");
            $('#title-modal').html("Tolak artikel judul " +'"' +data.name+'"');
            $('#feed_id').val(data.id);
            $('.agree-modal').modal('show');
        });

    });

     //get content
     $('body').on('click', '#view-article', function(){
        var feed_id = $(this).data("id");
        $.get(urls[20] + '/' + feed_id + '/show', function(data){
            var oldcontent = data.content;
            $('#content-modal').html("Konten artikel " +'"' +data.name+'"');
            $(".entry__img").attr("src",urls[5]+'/'+data.file)
            document.getElementById('description').innerHTML=oldcontent;
            $('.view-content').modal('show');
        });

    });

    // update approve article
    $('.responderForm').on('submit',(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        var feed_id = $(".responderForm").find("input[name='feed_id']").val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: urls[20] + '/' + feed_id+ '/update',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                // console.log(data);
                $('#responderForm').modal('hide');
                location.reload();
             },
            error: function(data){
                // console.log('Error:' ,data);
            }
        });

    }));

    // allmarkasRead
    $(document).on('click', '.all-read',function(){
        $.ajax({
            url : urls[19],
            method : "POST",
            data : {_token:csrf_token[0]},
            dataType : 'json',
            success : function (data)
            {
                window.location.href= urls[18];
            },
            error: function(data){
                // console.log('Error:' ,data);
            }
        });
});

// validate date create
$(function(){
    var dtToday = new Date();

    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate();
    var year = dtToday.getFullYear();
    if(month < 10)
    month = '0' + month.toString();
    if(day < 10)
    day = '0' + day.toString();

    var hours = dtToday.getHours();
    var minutes = dtToday.getMinutes();
    if(hours < 10 )
    hours = '0' + hours.toString();
    if(minutes < 10)
    minutes = '0' +minutes.toString();


    var maxDate = year + '-' + month + '-' +day;
    $('#txtDate').attr('min',maxDate);

    var maxTime = hours+':'+minutes
    // $('#txtTime').attr('min',maxTime);


    $(document).on('keyup change', '#txtDate', function(){
    if(document.getElementById("txtDate").value < maxDate)
        document.getElementById("create-agenda-btn").style.pointerEvents = "none",
        document.getElementById("create-agenda-btn").disabled = true;
    if(document.getElementById("txtDate").value > maxDate)
        document.getElementById("create-agenda-btn").disabled = false,
        document.getElementById("create-agenda-btn").style.pointerEvents = "auto";

    });
    $(document).on('keyup change', '#txtTime', function(){
        if(document.getElementById("txtDate").value == maxDate && document.getElementById("txtTime").value > maxTime)
        document.getElementById("create-agenda-btn").disabled = false,
        document.getElementById("create-agenda-btn").style.pointerEvents = "auto";
        if(document.getElementById("txtDate").value == maxDate && document.getElementById("txtTime").value < maxTime)
        document.getElementById("create-agenda-btn").disabled = true,
        document.getElementById("create-agenda-btn").style.pointerEvents = "none";
    });

    $('#editdate').attr('min',maxDate);

    $(document).on('keyup change', '#editdate', function(){
    if(document.getElementById("editdate").value < maxDate)
        document.getElementById("update-agenda-btn").style.pointerEvents = "none",
        document.getElementById("update-agenda-btn").disabled = true;
    if(document.getElementById("editdate").value > maxDate)
        document.getElementById("update-agenda-btn").disabled = false,
        document.getElementById("update-agenda-btn").style.pointerEvents = "auto";
    });

    $(document).on('keyup change', '#time', function(){
        // console.log(maxTime);
        if(document.getElementById("editdate").value == maxDate && document.getElementById("time").value > maxTime)
        document.getElementById("update-agenda-btn").disabled = false,
        document.getElementById("update-agenda-btn").style.pointerEvents = "auto";
        if(document.getElementById("editdate").value == maxDate && document.getElementById("time").value < maxTime)
        document.getElementById("update-agenda-btn").style.pointerEvents = "none",
        document.getElementById("update-agenda-btn").disabled = true;
    });


});

//delete agenda
$('body').on('click', '.delete-agenda', function(){
    var agenda_id = $(this).data("id");
    swal({
        title: "Apakah kamu yakin akan hapus agenda ini ?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete){
                $.ajax({
                    type: "DELETE",
                    url: urls[15] + '/' + agenda_id,
                    success: function(response){
                        swal("Data telah terhapus", {
                            icon: "success",
                        });
                        location.reload();
                        // $("#data-post").load(location.href + " #data-post");
                    },
                    error: function(data){
                        // console.log('Error:' ,data);
                    }
                });
            }
        });

});

//get value edit agenda
$('body').on('click', '.edit-detail', function(){
    var agenda_id = $(this).data("id");
    $.get(urls[15] + '/' + agenda_id + '/show', function(data){
        var newdate = moment(new Date(data[0]['start_At'] )).format("YYYY-MM-DD");
        var newtime = moment(new Date(data[0]['start_At'] )).format("HH:mm");
        $('#view-agenda').modal('show');
        document.getElementById("update-agenda-btn").style.display = "block";
        $('#agendaid').val(data[0]['id']);
        document.getElementById("editdate").style.display = "block";
        $('#name').val(data[0]['name']);
        document.getElementById("name").disabled = false;
        $('#editdate').val(newdate);
        document.getElementById("editdate").disabled = false;
        $('#time').val(newtime);
        document.getElementById("time").disabled = false;
        $('#place').val(data[0]['place']);
        document.getElementById("place").disabled = false;
        $('#description').val(data[0]['description']);
        document.getElementById("description").disabled = false;
        document.getElementById("date").style.display = "none";
        document.getElementById("notulen-input").style.display = "none";
        document.getElementById("agenda-file").style.display = "none";
    });

});

// update agendalist
$('#edit-agendalist').on('submit',(function(e) {

    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    var agenda_id = $("#view-agenda").find("input[name='agenda_id']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: urls[15] + '/' + agenda_id+ '/updateAgendaList',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            // console.log(data);
            $('#view-agenda').modal('hide');
            location.reload();

            // location.href=urls[2]+ '/' +post_id;
            // $("#khusus" + post_id).replaceWith(update1);
         },
        error: function(data){
            // console.log('Error:' ,data);
            // console.log(agenda_id);
        }
    });

}));

//get for closed conseling
    $('body').on('click', '.close-question', function(){
        var question_id = $(this).data("id");
        $.post(urls[22] + '/' + question_id + '/show', function(data){
            // console.log(data);
            $("button").addClass("btn-green");
            $('.close-btn').html("Tutup Pesan Konseling");
            $('#title-close').html("Tutup Pesan Konseling " +'"' +data.name+'"');
            $('#question_id').val(data.id);
            $('.closeconselingModal').modal('show');
        });

});

 // update close conseling
 $('.closeForm').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('_method', 'PUT');
    var question_id = $(".closeForm").find("input[name='question_id']").val();

    $.ajax({
        dataType: 'json',
        type:'POST',
        url: urls[22] + '/' + question_id+ '/update',
        data: formData,
        cache:false,
        contentType: false,
        processData: false,
        success: function(data){
            // console.log(data);
            $('#closeForm').modal('hide');
            location.reload();
            // document.getElementById("alert-success-close").innerHTML = "Berhasil menyelesaikan konseling";
            // document.getElementById("alert-success-close").style.display = "block";
         },
        error: function(data){
            // console.log('Error:' ,data);
        }
    });

}));

$(document).ready(function() {
    var interval = setInterval(function() {
    $('small').each(function(i, e) {
        moment.locale('id');
        var time = moment($(e).attr('datetime'));
            $(e).html('<span>' + time.fromNow() + '</span>');
    });
},1000);
});
$(document).ready(function() {
    var interval = setInterval(function() {
    $('time').each(function(i, e) {
        moment.locale('id');
        var time = moment($(e).attr('datetime'));
        // var time = moment();

         $(e).html('<span>' + time.fromNow() + '</span>');

    });
},1000);
});

// function validate(){

// }

// $('div.author-thumb').on('mouseover', function() {
//     document.getElementById("image").style.display = "inline";
// });


});

//validation textarea
// $(document).ready(function() {
//     $("textarea").keypress(function(e) {
//       var length = this.value.length;
//       if (length == 250) {
//         e.preventDefault();
//         $("div.error-message").html("Maksimal 250 karakter");
//       }
//     }),
//     $("textarea").on('keydown', function(e){
//       $("div.error-message").html("");
//   });

//   });

 // addcomment oonly 1page no append
//  $('.comment-form').on('submit',(function(e) {
//     e.preventDefault();
//     var data = new FormData($(this)[0]);
//     $.ajax({
//         type:'POST',
//         url: urls[3],
//         data: data,
//         cache:false,
//         contentType: false,
//         processData: false,
//         success:function(data){
//             // console.log(data);
//             post_id = data['post_id'];
//             comment_id = data['id'];
//             $("#comment"+post_id).load(location.href + " #comment"+post_id);
//             $("#countcomment"+post_id).load(location.href + " #countcomment"+post_id);

//             document.getElementById("comment-form"+post_id).reset();
//             document.getElementById("btn-comment"+post_id).disabled = true,
//             document.getElementById("btn-comment"+post_id).style.pointerEvents = "none";
//             // $('#btn-comment').hide();
//         },
//         error: function(data){
//             console.log(data);
//         }
//     });
// }));
