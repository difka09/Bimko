$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

//post statusform
    $('#statusForm').on('submit',(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    var formURL = $('#statusForm').attr("action");
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
            console.log(data);
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
            console.log(data);
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
            $('#content').val(data.content);
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
                console.log('Error:' ,data);
            }
        });

    }));

//  update post2
    $('#updateForm2').on('submit',(function(e) {

        e.preventDefault();
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
                console.log('Error:' ,data);
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
                            console.log('Error:' ,data);
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
                // console.log([urls[5]])
                post_id = data[0]['post_id'];
                comment_id = data[0]['id'];
                // $("#comment"+post_id).load(location.href + " #comment"+post_id);
                // $("#countcomment"+post_id).load(location.href + " #countcomment"+post_id);

                var comment = '<ul class="comments-list" id="comment-list"><div class="komen"><li class="comment-item"><input type="hidden" name="ax" class="name_val" value="'+comment_id+'"><input type="hidden" name="post" class="name_val" value="'+post_id+'"><div class="post__author author vcard inline-items"><img src="'+urls[5]+'/'+data[1][0]['file']+'" alt="author"><div class="author-date"><a class="h6 post__author-name fn" href="'+urls[14]+'/'+data[0]['user_id']+'">'+data[1][0]['name']+'</a> <div class="post__date"><time class="published" datetime="2004-07-24T18:18">38 mins ago</time></div></div><div href="#" class="more"><svg class="olymp-three-dots-icon"><use xlink:href="'+urls[7]+'"></use></svg><ul class="more-dropdown"><li><a class="delete-comment" href="javascript:void(0)" id="delete-comment" data-post="'+data[0]['post_id']+'" data-id="'+data[0]['id']+'">Delete Comment</a></li></ul></div></div><p>'+data[0]['message']+'</p></li></div></ul>';
                var count ='<div class="post-additional-info inline-items"><div class="comments-shared"><a class="post-add-icon inline-items"><svg class="olymp-speech-balloon-icon"><use xlink:href="'+urls[9]+'"></use></svg><span>'+data[2]+'</span></a></div></div>';
                $('#comment'+post_id).prepend(comment);
                $("#countcomment" + post_id).html(count);

                document.getElementById("comment-form"+post_id).reset();
                document.getElementById("btn-comment"+post_id).disabled = true,
                document.getElementById("btn-comment"+post_id).style.pointerEvents = "none";
                // $('#btn-comment').hide();
            },
            error: function(data){
                console.log(data);
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
                            console.log('Error:' ,data);
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

                document.getElementById("comment-form-show").reset();
                document.getElementById("btn-comment"+post_id).disabled = true,
                document.getElementById("btn-comment"+post_id).style.pointerEvents = "none";
                // $('#btn-comment').hide();
            },
            error: function(data){
                console.log(data);
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
                            console.log('Error:' ,data);
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
        console.log(id);
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
                $('#im-here').html(data);
            }
        });
        else
        var noresult = '';
        $('#im-here').html(noresult);
    });

    //get value agenda list
    $('body').on('click', '#view-detail', function(){
        var agenda_id = $(this).data("id");
        $.get(urls[15] + '/' + agenda_id + '/show', function(data){
            var newdate = moment(new Date(data[0]['start_At'] )).format("DD/MM/YYYY");
            var newtime = moment(new Date(data[0]['start_At'] )).format("HH:mm");
            $('#view-agenda').modal('show');
            $('#name').val(data[0]['name']);
            $('#date').val(newdate);
            $('#time').val(newtime);
            $('#place').val(data[0]['place']);
            $('#description').val(data[0]['description']);
            if(data[0]['summary']!=null){
            $('#agenda_not').val(data[0]['summary']);
            }else{
            $('#agenda_not').val('rapat belum dilaksanakan');
            }
            if(data[0]['file']!=null){
            document.getElementById('filename_file').innerHTML='<a style="color:blue" href="'+urls[15]+ '/' +agenda_id+ '/download">'+data[0]['file']+'</a>';
            }else{
            document.getElementById('filename_file').innerHTML="File belum diupload";
            }
            console.log(data[0]['file']);
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
            $('#summary-notulensi').val(data[0]['summary']);
        });

    });

    // add notulensi
    $('#notulensiForm').on('submit',(function(e) {

        e.preventDefault();
        var formData = new FormData(this);
        formData.append('_method', 'PUT');
        var agenda_id = $("#add-notulensi").find("input[name='agenda_id']").val();

        $.ajax({
            dataType: 'json',
            type:'POST',
            url: urls[15] + '/' + agenda_id+ '/update',
            data: formData,
            cache:false,
            contentType: false,
            processData: false,
            success: function(data){
                $('#add-notulensi').modal('hide');
                location.reload();

                // location.href=urls[2]+ '/' +post_id;
                // $("#khusus" + post_id).replaceWith(update1);
             },
            error: function(data){
                console.log('Error:' ,data);
                console.log(agenda_id);
            }
        });

    }));


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
