//post statusform
$(document).ready(function (e) {
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

    $('#uploadForm').on('submit',(function(e) {
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


//post fileform
    $('#postForm').on('submit',(function(e) {
        var fileku = $('#file_2').val();
        if(fileku=='')
        {
            alert("file kosong, silahkan pilih file");
        }
    e.preventDefault();
    var formData = new FormData(this);
    var formURL = $('#postForm').attr("action");

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
        // var content = $("#ajax-crud-modal").find("textarea[name='content']").val();
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
                $("#data-post").load(location.href + " #data-post");
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
                $("#data-post").load(location.href + " #data-post");
            },
            error: function(data){
                console.log('Error:' ,data);
            }
        });

    }));

//delete post
    $('body').on('click', '.delete-post', function(){
        var post_id = $(this).data("id");
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
        // confirm("are you sure want to delete !");
    });
});


// get filename file_1 and file_2
var input = document.getElementById( 'file_2' );
var input4 = document.getElementById( 'file_4' );
var infoArea = document.getElementById( 'filename_upload' );
var infoArea4 = document.getElementById( 'filename_upload_4' );

var input1 = document.getElementById( 'file_1' );
var input3 = document.getElementById( 'file_3' );
var infoArea1 = document.getElementById( 'filename_upload_1' );
var infoArea3 = document.getElementById( 'filename_upload_3' );

input.addEventListener( 'change', showFileName );
input1.addEventListener( 'change', showFileName1 );
input3.addEventListener( 'change', showFileName3 );
input4.addEventListener( 'change', showFileName4 );

function showFileName( event ) {
  var input = event.srcElement;// the change event gives us the input it occurred in
  var fileName = input.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
  infoArea.textContent = 'File name : ' + fileName;// use fileName however fits your app best, i.e. add it into a div
}
function showFileName1( event ) {
    var input1 = event.srcElement;// the change event gives us the input it occurred in
    var fileName1 = input1.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea1.textContent = 'File name : ' + fileName1;// use fileName however fits your app best, i.e. add it into a div
  }
function showFileName3( event ) {
    var input3 = event.srcElement;// the change event gives us the input it occurred in
    var fileName3 = input3.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea3.textContent = 'File name : ' + fileName3;// use fileName however fits your app best, i.e. add it into a div
  }
function showFileName4( event ) {
    var input4 = event.srcElement;// the change event gives us the input it occurred in
    var fileName4 = input4.files[0].name;// the input has an array of files in the `files` property, each one has a name that you can use. We're just using the name here.
    infoArea4.textContent = 'File name : ' + fileName4;// use fileName however fits your app best, i.e. add it into a div
  }


// $('button#delete-post').on('click', function(){
//         // var href = $(this).attr('href');
//         // var title = $(this).data('title');
//         swal({
//             title: "Apakah kamu yakin akan hapus postingan ini ?",
//             text: "Jika menghapus data ini, data akan hilang!",
//             icon: "warning",
//             buttons: true,
//             dangerMode: true,
//             })
//             .then((willDelete) => {
//             if (willDelete) {
//                 swal("Data telah terhapus", {
//                 icon: "success",
//                 });
//             }
//         });
// });


// spesial komen
//  <script>
//     if ($("#postForm").length > 0){
//         $("#postForm").validate({
//             submitHandler: function(form){
//                 $.ajaxSetup({
//                     headers: {
//                         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//                         }
//                     });

//                 $('#btn-save').html('posting..');
//                 var formData = new FormData($(this)[0]);

//                 $.ajax({
//                     // data:formData,
//                     data: $('#postForm').serialize(),
//                     url: "{{route('guru.addpost')}}",
//                     type: "POST",
//                     dataType: 'json',
//                     success: function(data){
//                         $('#btn-save').html('Post Status');
//                         document.getElementById("postForm").reset();
//                         location.reload();

//                         //untuk komen $("#data-post").load(location.href + " #data-post");

//                     }
//                 });
//                 // setInterval(function(){
//                 //     $('#post-data').html(data.html).fadeIn("slow");
//                 // }, 1000);
//             }
//         })
//     }
// </script>
